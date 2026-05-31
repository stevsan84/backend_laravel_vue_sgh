<?php

namespace App\Http\Controllers;

use App\Models\Nacionalidad;
use Illuminate\Http\Request;

class NacionalidadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $nacionalidades = Nacionalidad::all();
        return response()->json($nacionalidades, 200);
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
