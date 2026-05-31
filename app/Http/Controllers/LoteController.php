<?php

namespace App\Http\Controllers;

use App\Models\Lote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $limit = isset($request->limit) ? $request->limit : 10;
        //$term = strtolower($request->q);
        if (isset($request->q)) {
            $lotes = Lote::with(['producto','producto.almacenamientoTipo','laboratorioFabricante'])
                ->where(function ($query) use ($request) {
                    $searchTerms = explode(' ', $request->q);

                    // En producto
                    $query->whereHas('producto', function ($q) use ($searchTerms) {
                        foreach ($searchTerms as $term) {
                            $q->where(function ($subQ) use ($term) {
                                $subQ->whereRaw("unaccent(codigo_sku) ILIKE unaccent(?)", ["%$term%"])
                                    ->orWhereRaw("unaccent(nombre_especifico) ILIKE unaccent(?)", ["%$term%"])
                                    ->orWhereRaw("unaccent(nombre_comercial) ILIKE unaccent(?)", ["%$term%"]);
                            });
                        }
                    });

                    // En el campo de la propia tabla lote
                    foreach ($searchTerms as $term) {
                        $query->orWhereRaw("unaccent(numero::text) ILIKE unaccent(?)", ["%$term%"]);
                    }
                })
                ->orderBy('id', 'desc')
                ->paginate($limit);

                return response()->json($lotes, 200);
        } else {
            $lotes = Lote::orderBy('id', 'desc')
                ->with(['producto','producto.almacenamientoTipo','laboratorioFabricante'])
                ->paginate($limit);

            return response()->json($lotes, 200);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'producto_id' => 'required',
            'numero' => 'required|unique:lotes',
            'fecha_caducidad' => 'required',
            'laboratorio_fabricante_id' => 'required',
        ]);

        $lote = new Lote();
        $lote->producto_id = $request->producto_id;
        $lote->laboratorio_fabricante_id = $request->laboratorio_fabricante_id;
        $lote->numero = $request->numero;
        $lote->fecha_creacion = $request->fecha_creacion;
        $lote->fecha_caducidad = $request->fecha_caducidad;
        $lote->registro_sanitario = $request->registro_sanitario;
        $lote->costo = 0;
        $lote->observacion = $request->observacion;
        $lote->user_id = Auth::user()->id;
        $lote->save();

        return response()->json(["mensaje" => "Lote registrado en la BD"], 200);
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

        $unidad = Lote::find($id);
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
