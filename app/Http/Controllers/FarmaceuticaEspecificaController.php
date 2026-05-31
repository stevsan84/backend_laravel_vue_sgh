<?php

namespace App\Http\Controllers;

use App\Models\FarmaceuticaEspecifica;
use Illuminate\Http\Request;

class FarmaceuticaEspecificaController extends Controller
{
    //
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        //$farmaceuticaGeneral = FarmaceuticaEspecifica::all();
        //return response()->json($farmaceuticaGeneral, 200);
    }

    public function getFarmaceuticasE($farmaceuticaG_id)
    {
        $farmaceuticaEspecificas = FarmaceuticaEspecifica::where('farmaceutica_general_id', $farmaceuticaG_id)->get();
        return response()->json($farmaceuticaEspecificas, 200);
    }

     /* Store a newly created resource in storage.
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
