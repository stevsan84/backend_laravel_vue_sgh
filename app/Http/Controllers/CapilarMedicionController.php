<?php

namespace App\Http\Controllers;

use App\Models\CapilarMedicion;
use Illuminate\Http\Request;

class CapilarMedicionController extends Controller
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
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $medicionCapilar = CapilarMedicion::where('preparacion_id',$id)->first();
        return response()->json($medicionCapilar, 200);
    }

    public function getCapilarMedicionMedico($id)
    {
        //
        $medicionCapilar = CapilarMedicion::where('atencion_formulario_id',$id)->first();
        return response()->json($medicionCapilar, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
