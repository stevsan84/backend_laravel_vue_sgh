<?php

namespace App\Http\Controllers;

use App\Models\Formulario008Antecedente;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class Formulario008AntecedenteController extends Controller
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
            'antecedente.observacion' => 'required',
            'antecedente.antecedente' => 'required',
        ]);

        DB::beginTransaction();

        try {

            $antecedente = new Formulario008Antecedente();
            $antecedente->atencion_id = $request->atencion_id;
            $antecedente->atencion_formulario_id = $request->atencion_formulario_id;
            $antecedente->paciente_id = $request->paciente_id;
            $antecedente->area_salud_id = $request->area_salud_id;
            $antecedente->fecha = date("Y-m-d H:i:s");
            $antecedente->observacion = $request->antecedente["observacion"];
            $antecedente->user_id = Auth::user()->id;
            $antecedente->save();

            //accidente es un array de IDs numéricos ([2, 6]), no un array de objetos con campos como "id" => 2, etc.
            //foreach ($request->evento['accidente'] as $evento_tipo_id) {
            //    $evento->eventoTipos()->attach($evento_tipo_id);
            //}

            //Si quieres asegurarte de no duplicar relaciones en la tabla pivote, usa:

            //foreach ($request->evento['accidente'] as $evento_tipo_id) {
            //    $evento->eventoTipos()->syncWithoutDetaching([$evento_tipo_id]);
            //}
            //Esto agrega solo los que no estén ya relacionados.

            $antecedente->antecedentes()->syncWithoutDetaching($request->antecedente['antecedente']);

            DB::commit();

            return response()->json(["mensaje" => "Antecedente registrada en la BD"], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(["mensaje" => "Ocurrió error al registrar el antecedente", "error" => $e->getMessage()], 400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $formularioAntecedente = Formulario008Antecedente::where('atencion_formulario_id', $id)
            ->with('antecedentes')
            ->first();
        
        return response()->json($formularioAntecedente, 200);
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
            'antecedente.observacion' => 'required',
            'antecedente.antecedente' => 'required',
        ]);

        DB::beginTransaction();

        try {

            $antecedente = Formulario008Antecedente::findOrFail($id);
            $antecedente->atencion_id = $request->atencion_id;
            $antecedente->atencion_formulario_id = $request->atencion_formulario_id;
            $antecedente->paciente_id = $request->paciente_id;
            $antecedente->area_salud_id = $request->area_salud_id;
            //$antecedente->fecha = date("Y-m-d H:i:s");
            $antecedente->observacion = $request->antecedente["observacion"];
            $antecedente->user_id = Auth::user()->id;
            $antecedente->save();

            $antecedente->antecedentes()->sync($request->antecedente['antecedente']);

            DB::commit();

            return response()->json(["mensaje" => "Antecedente registrada en la BD"], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(["mensaje" => "Ocurrió error al registrar el antecedente", "error" => $e->getMessage()], 400);
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
