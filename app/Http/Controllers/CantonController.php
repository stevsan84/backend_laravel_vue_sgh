<?php

namespace App\Http\Controllers;

use App\Models\Canton;
use Illuminate\Http\Request;

class CantonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function getCantones($provincia_id)
    {
        $cantones = Canton::where('provincia_id', $provincia_id)->get();
        return response()->json($cantones, 200);
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
