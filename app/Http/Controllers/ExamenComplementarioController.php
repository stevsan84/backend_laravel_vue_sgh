<?php

namespace App\Http\Controllers;

use App\Models\ExamenComplementario;
use Illuminate\Http\Request;

class ExamenComplementarioController extends Controller
{
    //
    public function index()
    {
        //
       $examenComplementarios = ExamenComplementario::all();
        return response()->json($examenComplementarios, 200);
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
}
