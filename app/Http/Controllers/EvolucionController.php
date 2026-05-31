<?php

namespace App\Http\Controllers;

use App\Models\Evolucion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EvolucionController extends Controller
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
            'evolucion.evolucion' => 'required',
        ]);


            $evolucion = new Evolucion();
            $evolucion->atencion_id = $request->atencion_id;
            $evolucion->atencion_formulario_id = $request->atencion_formulario_id;
            $evolucion->paciente_id = $request->paciente_id;
            $evolucion->area_salud_id = $request->area_salud_id;
            $evolucion->fecha = date("Y-m-d H:i:s");
            $evolucion->evolucion = $request->evolucion["evolucion"];
            $evolucion->user_id = Auth::user()->id;
            $evolucion->save();

            return response()->json(["mensaje" => "Evolucion registrada en la BD"], 200);
        
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $evolucion = Evolucion::where('atencion_formulario_id', $id)
            ->first();
        
        return response()->json($evolucion, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
         $request->validate([
            'atencion_id' => 'required',
            'atencion_formulario_id' => 'required',
            'paciente_id' => 'required',
            'area_salud_id' => 'required',
            'evolucion.evolucion' => 'required',
        ]);


            $evolucion = Evolucion::findOrFail($id);
            $evolucion->atencion_id = $request->atencion_id;
            $evolucion->atencion_formulario_id = $request->atencion_formulario_id;
            $evolucion->paciente_id = $request->paciente_id;
            $evolucion->area_salud_id = $request->area_salud_id;
            //$evolucion->fecha = date("Y-m-d H:i:s");
            $evolucion->evolucion = $request->evolucion["evolucion"];
            $evolucion->user_id = Auth::user()->id;
            $evolucion->save();

            return response()->json(["mensaje" => "Evolucion registrada en la BD"], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
