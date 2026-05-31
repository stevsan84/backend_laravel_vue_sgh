<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoriaController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $categorias = Categoria::orderBy('id', 'asc')
                            ->with(['almacenamientoTipo'])->get();
        return response()->json($categorias, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'codigo' => 'required|unique:categorias',
            'nombre' => 'required|unique:categorias',
            'almacenamiento_tipo_id' => 'required',
        ]);

        $categoria = new Categoria();
        $categoria->codigo = $request->codigo;
        $categoria->nombre = $request->nombre;
        $categoria->almacenamiento_tipo_id = $request->almacenamiento_tipo_id;
        $categoria->descripcion = $request->descripcion;
        $categoria->user_id = Auth::user()->id;
        $categoria->save();

        return response()->json(["mensaje" => "Categoría registrado en la BD"], 200);
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

        $categoria = Categoria::find($id);
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
