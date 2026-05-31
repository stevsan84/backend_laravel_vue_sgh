<?php

namespace App\Http\Controllers;

use App\Models\Transaccion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransaccionController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $transaccion = Transaccion::orderBy('id', 'asc')
                            ->with(['tipoTransaccion'])->get();
        return response()->json($transaccion, 200);
    }

     public function funBuscar(Request $request){

        $search = strtolower($request->search);
        $transaccion =  Transaccion::whereRaw("unaccent(lower(nombre)) LIKE unaccent(lower(?))", ["%{$search}%"])
            ->orderBy('nombre')
            ->with(['tipoTransaccion'])
            ->limit(20)
            ->get();
            //->get(['id', 'nombre']);
        
        return response()->json($transaccion , 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nombre' => 'required',
            'codigo' => 'required|unique:transaccions',
            'tipo_transaccion_id' => 'required',
            'gestion_vacuna' => 'required',
        ]);

        $transaccion = new Transaccion();
        $transaccion->nombre = $request->nombre;
        $transaccion->codigo = $request->codigo;
        $transaccion->tipo_transaccion_id = $request->tipo_transaccion_id;
        $transaccion->gestion_vacuna = $request->gestion_vacuna;
        $transaccion->descripcion = $request->descripcion;
        $transaccion->user_id = Auth::user()->id;
        $transaccion->save();

        return response()->json(["mensaje" => "Transacción registrado en la BD"], 200);
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
            'nombre' => 'required',
            'codigo' => 'required|unique:transaccions,codigo,' .$id,
            'tipo_transaccion_id' => 'required',
            'gestion_vacuna' => 'required',
        ]);

        $transaccion =  Transaccion::find($id);
        $transaccion->nombre = $request->nombre;
        $transaccion->codigo = $request->codigo;
        $transaccion->tipo_transaccion_id = $request->tipo_transaccion_id;
        $transaccion->gestion_vacuna = $request->gestion_vacuna;
        $transaccion->descripcion = $request->descripcion;
        $transaccion->user_id = Auth::user()->id;
        $transaccion->save();

        return response()->json(["mensaje" => "Transacción actualizado en la BD"], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}