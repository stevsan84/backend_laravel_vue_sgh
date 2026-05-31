<?php

namespace App\Http\Controllers;

use App\Models\Formulario008ExamenFisico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Formulario008ExamenFisicoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
           $request->validate([
            'atencion_id' => 'required',
            'atencion_formulario_id' => 'required',
            'paciente_id' => 'required',
            'area_salud_id' => 'required',
            'examenFisico.observacion' => 'required',
            'examenFisico.examenFisico' => 'required',
        ]);

        DB::beginTransaction();

        try {

            $examenFisico = new Formulario008ExamenFisico();
            $examenFisico->atencion_id = $request->atencion_id;
            $examenFisico->atencion_formulario_id = $request->atencion_formulario_id;
            $examenFisico->paciente_id = $request->paciente_id;
            $examenFisico->area_salud_id = $request->area_salud_id;
            $examenFisico->fecha = date("Y-m-d H:i:s");
            $examenFisico->observacion = $request->examenFisico["observacion"];
            $examenFisico->user_id = Auth::user()->id;
            $examenFisico->save();

            //accidente es un array de IDs numéricos ([2, 6]), no un array de objetos con campos como "id" => 2, etc.
            //foreach ($request->evento['accidente'] as $evento_tipo_id) {
            //    $evento->eventoTipos()->attach($evento_tipo_id);
            //}

            //Si quieres asegurarte de no duplicar relaciones en la tabla pivote, usa:

            //foreach ($request->evento['accidente'] as $evento_tipo_id) {
            //    $evento->eventoTipos()->syncWithoutDetaching([$evento_tipo_id]);
            //}
            //Esto agrega solo los que no estén ya relacionados.

            $examenFisico->examenFisicos()->syncWithoutDetaching($request->examenFisico['examenFisico']);

            DB::commit();

            return response()->json(["mensaje" => "Examen Fisico registrada en la BD"], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(["mensaje" => "Ocurrió error al registrar el examen fisico", "error" => $e->getMessage()], 400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
         $formularioExamenFisico = Formulario008ExamenFisico::where('atencion_formulario_id', $id)
            ->with('examenFisicos')
            ->first();
        
        return response()->json($formularioExamenFisico, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'atencion_id' => 'required',
            'atencion_formulario_id' => 'required',
            'paciente_id' => 'required',
            'area_salud_id' => 'required',
            'examenFisico.observacion' => 'required',
            'examenFisico.examenFisico' => 'required',
        ]);

        DB::beginTransaction();

        try {

            $examenFisico =  Formulario008ExamenFisico::findOrFail($id);
            $examenFisico->atencion_id = $request->atencion_id;
            $examenFisico->atencion_formulario_id = $request->atencion_formulario_id;
            $examenFisico->paciente_id = $request->paciente_id;
            $examenFisico->area_salud_id = $request->area_salud_id;
            //$examenFisico->fecha = date("Y-m-d H:i:s");
            $examenFisico->observacion = $request->examenFisico["observacion"];
            $examenFisico->user_id = Auth::user()->id;
            $examenFisico->save();

            $examenFisico->examenFisicos()->sync($request->examenFisico['examenFisico']);
        
            DB::commit();

            return response()->json(["mensaje" => "Examen Fisico actualizado en la BD"], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(["mensaje" => "Ocurrió error al actualizar el examen fisico", "error" => $e->getMessage()], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
