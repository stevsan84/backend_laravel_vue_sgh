<?php

namespace App\Http\Controllers;

use App\Models\CitaSubtipo;
use Illuminate\Http\Request;

class CitaSubtipoController extends Controller
{
    //
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        //$citaSubtipo = CitaSubtipo::all();
        //eturn response()->json($citaSubtipo, 200);
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
    public function show(string $id)
    {
        //
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

    public function getCitaSubtipo($citaTipo_id)
    {
        //
         $citaSubtipos = CitaSubtipo::where('cita_tipo_id',$citaTipo_id)->get();

        return response()->json($citaSubtipos, 200);
    }
}
