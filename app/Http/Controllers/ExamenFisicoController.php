<?php

namespace App\Http\Controllers;

use App\Models\ExamenFisico;
use App\Models\Formulario008ExamenFisico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ExamenFisicoController extends Controller
{
    //
    public function index()
    {
        //
       $examenFisicos = ExamenFisico::all();
        return response()->json($examenFisicos, 200);
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
