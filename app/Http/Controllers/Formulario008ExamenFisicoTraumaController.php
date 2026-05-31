<?php

namespace App\Http\Controllers;

use App\Models\Formulario008ExamenFisicoTrauma;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Formulario008ExamenFisicoTraumaController extends Controller
{
    //
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
            'examenFisicoT.observacion' => 'required',
        ]);

        DB::beginTransaction();

        try {

            $examenFisicoT = new Formulario008ExamenFisicoTrauma();
            $examenFisicoT->atencion_id = $request->atencion_id;
            $examenFisicoT->atencion_formulario_id = $request->atencion_formulario_id;
            $examenFisicoT->paciente_id = $request->paciente_id;
            $examenFisicoT->area_salud_id = $request->area_salud_id;
            $examenFisicoT->fecha = date("Y-m-d H:i:s");
            $examenFisicoT->observacion = $request->examenFisicoT["observacion"];
            $examenFisicoT->user_id = Auth::user()->id;
            $examenFisicoT->save();

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
         $formularioExamenFisicoT = Formulario008ExamenFisicoTrauma::where('atencion_formulario_id', $id)
            ->first();
        
        return response()->json($formularioExamenFisicoT, 200);
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
            'examenFisicoT.observacion' => 'required',
        ]);

        DB::beginTransaction();

        try {

            $examenFisicoT =  Formulario008ExamenFisicoTrauma::findOrFail($id);
            $examenFisicoT->atencion_id = $request->atencion_id;
            $examenFisicoT->atencion_formulario_id = $request->atencion_formulario_id;
            $examenFisicoT->paciente_id = $request->paciente_id;
            $examenFisicoT->area_salud_id = $request->area_salud_id;
            //$examenFisicoT->fecha = date("Y-m-d H:i:s");
            $examenFisicoT->observacion = $request->examenFisicoT["observacion"];
            $examenFisicoT->user_id = Auth::user()->id;
            $examenFisicoT->save();
        
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
