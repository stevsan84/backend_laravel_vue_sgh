<?php

namespace App\Http\Controllers;

use App\Models\Formulario008Embarazo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Formulario008EmbarazoController extends Controller
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
        ]);

        DB::beginTransaction();

        try {

            $embarazo = new Formulario008Embarazo();
            $embarazo->atencion_id = $request->atencion_id;
            $embarazo->atencion_formulario_id = $request->atencion_formulario_id;
            $embarazo->paciente_id = $request->paciente_id;
            $embarazo->area_salud_id = $request->area_salud_id;
            $embarazo->fecha = date("Y-m-d H:i:s");
            $embarazo->numero_gestas = $request->embarazo["numero_gestas"] ?? null;
            $embarazo->numero_partos = $request->embarazo["numero_partos"] ?? null;
            $embarazo->numero_abortos = $request->embarazo["numero_abortos"] ?? null;
            $embarazo->numero_cesareas = $request->embarazo["numero_cesareas"] ?? null;
            $embarazo->fum = $request->embarazo["fum"] ?? null;
            $embarazo->semanas_gestacion = $request->embarazo["semanas_gestacion"] ?? null;
            $embarazo->movimiento_fetal = $request->embarazo["movimiento_fetal"] ?? null;
            $embarazo->frecuencia_cardiaca_fetal = $request->embarazo["frecuencia_cardiaca_fetal"] ?? null;
            $embarazo->ruptura_membranas = $request->embarazo["ruptura_membranas"] ?? null;
            $embarazo->tiempo = $request->embarazo["tiempo"] ?? null;
            $embarazo->afu = $request->embarazo["afu"] ?? null;
            $embarazo->presentacion = $request->embarazo["presentacion"] ?? null;
            $embarazo->dilatacion = $request->embarazo["dilatacion"] ?? null;
            $embarazo->borramiento = $request->embarazo["borramiento"] ?? null;
            $embarazo->plano = $request->embarazo["plano"] ?? null;
            $embarazo->pelvis_viable = $request->embarazo["pelvis_viable"] ?? null;
            $embarazo->sangrado_vaginal = $request->embarazo["sangrado_vaginal"] ?? null;
            $embarazo->contracciones = $request->embarazo["contracciones"] ?? null;
            $embarazo->score_mama = $request->embarazo["score_mama"] ?? null;
            $embarazo->observacion = $request->embarazo["observacion"] ?? null;
            $embarazo->user_id = Auth::user()->id;
            $embarazo->save();

            DB::commit();

            return response()->json(["mensaje" => "Embarazo registrada en la BD"], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(["mensaje" => "Ocurrió error al registrar el embarazo", "error" => $e->getMessage()], 400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $formularioEmbarazo = Formulario008Embarazo::where('atencion_formulario_id', $id)
           ->first();
        
        return response()->json($formularioEmbarazo, 200);
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
        ]);

        DB::beginTransaction();

        try {

            $embarazo = Formulario008Embarazo::findOrFail($id);
            $embarazo->atencion_id = $request->atencion_id;
            $embarazo->atencion_formulario_id = $request->atencion_formulario_id;
            $embarazo->paciente_id = $request->paciente_id;
            $embarazo->area_salud_id = $request->area_salud_id;
            //$embarazo->fecha = date("Y-m-d H:i:s");
            $embarazo->numero_gestas = $request->embarazo["numero_gestas"] ?? null;
            $embarazo->numero_partos = $request->embarazo["numero_partos"] ?? null;
            $embarazo->numero_abortos = $request->embarazo["numero_abortos"] ?? null;
            $embarazo->numero_cesareas = $request->embarazo["numero_cesareas"] ?? null;
            $embarazo->fum = $request->embarazo["fum"] ?? null;
            $embarazo->semanas_gestacion = $request->embarazo["semanas_gestacion"] ?? null;
            $embarazo->movimiento_fetal = $request->embarazo["movimiento_fetal"] ?? null;
            $embarazo->frecuencia_cardiaca_fetal = $request->embarazo["frecuencia_cardiaca_fetal"] ?? null;
            $embarazo->ruptura_membranas = $request->embarazo["ruptura_membranas"] ?? null;
            $embarazo->tiempo = $request->embarazo["tiempo"] ?? null;
            $embarazo->afu = $request->embarazo["afu"] ?? null;
            $embarazo->presentacion = $request->embarazo["presentacion"] ?? null;
            $embarazo->dilatacion = $request->embarazo["dilatacion"] ?? null;
            $embarazo->borramiento = $request->embarazo["borramiento"] ?? null;
            $embarazo->plano = $request->embarazo["plano"] ?? null;
            $embarazo->pelvis_viable = $request->embarazo["pelvis_viable"] ?? null;
            $embarazo->sangrado_vaginal = $request->embarazo["sangrado_vaginal"] ?? null;
            $embarazo->contracciones = $request->embarazo["contracciones"] ?? null;
            $embarazo->score_mama = $request->embarazo["score_mama"] ?? null;
            $embarazo->observacion = $request->embarazo["observacion"] ?? null;
            $embarazo->user_id = Auth::user()->id;
            $embarazo->save();

            DB::commit();

            return response()->json(["mensaje" => "Embarazo registrada en la BD"], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(["mensaje" => "Ocurrió error al registrar el embaraz0", "error" => $e->getMessage()], 400);
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
