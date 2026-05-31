<?php

namespace App\Http\Controllers;

use App\Models\AdmisionPaciente;
use Illuminate\Http\Request;

class AdmisionPacienteController extends Controller
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
        $admisionPaciente = AdmisionPaciente::where('atencion_formulario_id',$id)->first();
        return response()->json($admisionPaciente, 200);
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
