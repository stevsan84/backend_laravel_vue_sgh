<?php

namespace App\Http\Controllers;

use App\Models\BodegaGrupo;
use Illuminate\Http\Request;

class BodegaGrupoController extends Controller
{
    //
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $bodegaGrupo = BodegaGrupo::all();
        return response()->json($bodegaGrupo, 200);
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
    public function update(Request $request, $id)
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
