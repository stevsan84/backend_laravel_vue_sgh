<?php

namespace App\Http\Controllers;

use App\Models\Unidad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UnidadController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $unidades = Unidad::orderBy('id', 'asc')
                            ->with(['tipoUnidad'])->get();
        return response()->json($unidades, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nombre' => 'required|unique:unidads',
            'abreviatura' => 'required',
            'tipo_unidad_id' => 'required',
        ]);

        $unidad = new Unidad();
        $unidad->nombre = $request->nombre;
        $unidad->abreviatura = $request->abreviatura;
        $unidad->tipo_unidad_id = $request->tipo_unidad_id;
        $unidad->descripcion = $request->descripcion;
        $unidad->user_id = Auth::user()->id;
        $unidad->save();

        return response()->json(["mensaje" => "Unidad registrado en la BD"], 200);
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
            'nombre' => 'required|unique:unidads,nombre,' . $id,
            'abreviatura' => 'required',
            'tipo_unidad_id' => 'required',
        ]);

        $unidad = Unidad::find($id);
        $unidad->nombre = $request->nombre;
        $unidad->abreviatura = $request->abreviatura;
        $unidad->tipo_unidad_id = $request->tipo_unidad_id;
        $unidad->descripcion = $request->descripcion;
        $unidad->user_id = Auth::user()->id;
        $unidad->save();

        return response()->json(["mensaje" => "Unidad actualizado en la BD"], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
