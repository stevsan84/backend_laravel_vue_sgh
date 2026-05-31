<?php

namespace App\Http\Controllers;

use App\Models\Cie10;
use Illuminate\Http\Request;

class Cie10Controller extends Controller
{
    //
    public function index(Request $request)
    {
        //

        $limit = isset($request->limit) ? $request->limit : 10;
        $term = strtolower($request->q);
        if (isset($request->q)) {
            $cies = Cie10::orderBy('id', 'asc')
                ->whereRaw("unaccent(lower(clave)) LIKE unaccent(lower(?))", ["%{$term}%"])
                ->orWhereRaw("unaccent(lower(nombre)) LIKE unaccent(lower(?))", ["%{$term}%"])
                ->paginate($limit);
            
            return response()->json($cies, 200);
        } else {
            $cies = Cie10::orderBy('id', 'asc')
                ->paginate($limit);

            return response()->json($cies, 200);
        }
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
