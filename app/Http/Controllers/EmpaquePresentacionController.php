<?php

namespace App\Http\Controllers;

use App\Models\EmpaquePresentacion;
use Illuminate\Http\Request;

class EmpaquePresentacionController extends Controller
{
    //
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $empaque = EmpaquePresentacion::all();
        return response()->json($empaque, 200);
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
