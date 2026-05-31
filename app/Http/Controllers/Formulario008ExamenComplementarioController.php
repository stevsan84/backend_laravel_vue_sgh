<?php

namespace App\Http\Controllers;

use App\Models\Formulario008ExamenComplementario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Formulario008ExamenComplementarioController extends Controller
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
            'examenComplementario.observacion' => 'required',
            'examenComplementario.examenComplementario' => 'required',
        ]);

        DB::beginTransaction();

        try {

            $examenComplementario = new Formulario008ExamenComplementario();
            $examenComplementario->atencion_id = $request->atencion_id;
            $examenComplementario->atencion_formulario_id = $request->atencion_formulario_id;
            $examenComplementario->paciente_id = $request->paciente_id;
            $examenComplementario->area_salud_id = $request->area_salud_id;
            $examenComplementario->fecha = date("Y-m-d H:i:s");
            $examenComplementario->observacion = $request->examenComplementario["observacion"];
            $examenComplementario->user_id = Auth::user()->id;
            $examenComplementario->save();

            //accidente es un array de IDs numéricos ([2, 6]), no un array de objetos con campos como "id" => 2, etc.
            //foreach ($request->evento['accidente'] as $evento_tipo_id) {
            //    $evento->eventoTipos()->attach($evento_tipo_id);
            //}

            //Si quieres asegurarte de no duplicar relaciones en la tabla pivote, usa:

            //foreach ($request->evento['accidente'] as $evento_tipo_id) {
            //    $evento->eventoTipos()->syncWithoutDetaching([$evento_tipo_id]);
            //}
            //Esto agrega solo los que no estén ya relacionados.

            $examenComplementario->examenComplementarios()->syncWithoutDetaching($request->examenComplementario['examenComplementario']);

            DB::commit();

            return response()->json(["mensaje" => "Examen Complementario registrada en la BD"], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(["mensaje" => "Ocurrió error al registrar el examen complementario", "error" => $e->getMessage()], 400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
         $formularioExamenComplementario = Formulario008ExamenComplementario::where('atencion_formulario_id', $id)
            ->with('examenComplementarios')
            ->first();
        
        return response()->json($formularioExamenComplementario, 200);
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
            'examenComplementario.observacion' => 'required',
            'examenComplementario.examenComplementario' => 'required',
        ]);

        DB::beginTransaction();

        try {

            $examenComplementario =  Formulario008ExamenComplementario::findOrFail($id);
            $examenComplementario->atencion_id = $request->atencion_id;
            $examenComplementario->atencion_formulario_id = $request->atencion_formulario_id;
            $examenComplementario->paciente_id = $request->paciente_id;
            $examenComplementario->area_salud_id = $request->area_salud_id;
            //$examenFisico->fecha = date("Y-m-d H:i:s");
            $examenComplementario->observacion = $request->examenComplementario["observacion"];
            $examenComplementario->user_id = Auth::user()->id;
            $examenComplementario->save();
            
            $examenComplementario->examenComplementarios()->sync($request->examenComplementario['examenComplementario']);
        
            DB::commit();

            return response()->json(["mensaje" => "Examen Complementario actualizado en la BD"], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(["mensaje" => "Ocurrió error al actualizar el examen complementario", "error" => $e->getMessage()], 400);
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
