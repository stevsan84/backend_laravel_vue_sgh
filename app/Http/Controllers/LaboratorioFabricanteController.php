<?php

namespace App\Http\Controllers;

use App\Models\LaboratorioFabricante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LaboratorioFabricanteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        //$fabricantes = LaboratorioFabricante::all();
        //return response()->json($fabricantes, 200);

        //$search = $request->search;
        $search = strtolower($request->search);
        $fabricantes =  LaboratorioFabricante::whereRaw("unaccent(lower(nombre)) LIKE unaccent(lower(?))", ["%{$search}%"])
            ->orderBy('nombre')
            ->limit(20)
            ->get();
            //->get(['id', 'nombre']);
        
        return response()->json($fabricantes, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nombre' => 'required|unique:laboratorio_fabricantes'
        ]);

        $fabricante = new LaboratorioFabricante();
        $fabricante->nombre = $request->nombre;
        $fabricante->descripcion = $request->descripcion;
        $fabricante->user_id = Auth::user()->id;
        $fabricante->save();

        return response()->json(["mensaje" => "Laboratorio Fabricante registrado en la BD"], 200);
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
        $request->validate([
            'codigo' => 'required|unique:categorias,codigo,' . $id,
            'nombre' => 'required|unique:categorias,nombre,' . $id,
            'almacenamiento_tipo_id' => 'required',
        ]);

        $categoria = LaboratorioFabricante::find($id);
        $categoria->codigo = $request->codigo;
        $categoria->nombre = $request->nombre;
        $categoria->almacenamiento_tipo_id = $request->almacenamiento_tipo_id;
        $categoria->descripcion = $request->descripcion;
        $categoria->user_id = Auth::user()->id;
        $categoria->save();

        return response()->json(["mensaje" => "Categoría actualizado en la BD"], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
