<?php

namespace App\Http\Controllers;

use App\Models\Presentacion;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductoController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $limit = isset($request->limit) ? $request->limit : 10;
        $term = strtolower($request->q);
        if (isset($request->q)) {

            $productos = Producto::orderBy('id', 'asc')
                ->whereRaw("unaccent(lower(codigo_sku)) LIKE unaccent(lower(?))", ["%{$term}%"])
                ->orWhereRaw("unaccent(lower(nombre_especifico)) LIKE unaccent(lower(?))", ["%{$term}%"])
                ->orWhereRaw("unaccent(lower(nombre_comercial)) LIKE unaccent(lower(?))", ["%{$term}%"])
                ->with(['almacenamientoTipo', 'categoria', 'unidad','presentacion'])
                ->paginate($limit);

            return response()->json($productos, 200);

            //$productos = Producto::with(['almacenamientoTipo', 'categoria', 'unidad'])->get();

            //return response()->json($productos, 200);
        } else {
                $productos = Producto::orderBy('id', 'asc')
                    ->with(['almacenamientoTipo', 'categoria', 'unidad','presentacion'])//'presentacion.empaquePresentacion','presentacion.presentacionUnidad'])
                    ->paginate($limit);

            return response()->json($productos, 200);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'almacenamiento_tipo_id' => 'required',
            'nombre_ficha' => 'required',
            'codigo_sku' => 'required|unique:productos',
            'codigo_barra' => 'required|unique:productos',
            'nombre_especifico' => 'required',
            'nombre_comercial' => 'required',
            'categoria_id' => 'required',
            'unidad_id' => 'required',
        ]);

        $producto = new Producto();
        $producto->almacenamiento_tipo_id = $request->almacenamiento_tipo_id;
        $producto->codigo_cum_cudim = $request->codigo_cum_cudim;
        $producto->nombre_ficha = $request->nombre_ficha;
        $producto->codigo_sku = $request->codigo_sku;
        $producto->nombre_especifico = $request->nombre_especifico;
        $producto->nombre_comercial = $request->nombre_comercial;
        $producto->codigo_barra = $request->codigo_barra;
        $producto->categoria_id = $request->categoria_id;
        $producto->unidad_id = $request->unidad_id;
        $producto->farmaceutica_general_id = $request->farmaceutica_general_id;
        $producto->farmaceutica_especifica_id = $request->farmaceutica_especifica_id;
        $producto->descripcion = $request->descripcion;
        $producto->observacion = $request->observacion;
        $producto->cadena_frio = $request->cadena_frio;
        $producto->lote = $request->lote;
        $producto->registro_sanitario = $request->registro_sanitario;
        $producto->fecha_caducidad = $request->fecha_caducidad;
        $producto->alerta_caducidad = $request->alerta_caducidad;
        $producto->dias_caducidad = $request->dias_caducidad;
        $producto->alerta_canje = $request->alerta_canje;
        $producto->dias_canje = $request->dias_canje;
        $producto->vacuna = $request->vacuna;
        $producto->user_id = Auth::user()->id;
        $producto->save();

        if ($request->filled('empaque_presentacion_id')){
            $presentacion = new Presentacion();
            $presentacion->producto_id = $producto->id;
            $presentacion->empaque_presentacion_id = $request->empaque_presentacion_id;
            $presentacion->presentacion_unidad_id = $request->presentacion_unidad_id;
            $presentacion->cantidad = $request->cantidad;
            $presentacion->save();
        }

        return response()->json(["mensaje" => "Producto registrado en la BD"], 200);
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
        $request->validate([
            'almacenamiento_tipo_id' => 'required',
            'nombre_ficha' => 'required',
            'codigo_sku' => 'required|unique:productos,codigo_sku,' . $id,
            'codigo_barra' => 'required|unique:productos,codigo_barra,' . $id,
            'nombre_especifico' => 'required',
            'nombre_comercial' => 'required',
            'categoria_id' => 'required',
            'unidad_id' => 'required',
        ]);

        $producto = Producto::find($id);
        $producto->almacenamiento_tipo_id = $request->almacenamiento_tipo_id;
        $producto->codigo_cum_cudim = $request->codigo_cum_cudim;
        $producto->nombre_ficha = $request->nombre_ficha;
        $producto->codigo_sku = $request->codigo_sku;
        $producto->nombre_especifico = $request->nombre_especifico;
        $producto->nombre_comercial = $request->nombre_comercial;
        $producto->codigo_barra = $request->codigo_barra;
        $producto->categoria_id = $request->categoria_id;
        $producto->unidad_id = $request->unidad_id;
        $producto->farmaceutica_general_id = $request->farmaceutica_general_id;
        $producto->farmaceutica_especifica_id = $request->farmaceutica_especifica_id;
        $producto->descripcion = $request->descripcion;
        $producto->observacion = $request->observacion;
        $producto->cadena_frio = $request->cadena_frio;
        $producto->lote = $request->lote;
        $producto->registro_sanitario = $request->registro_sanitario;
        $producto->fecha_caducidad = $request->fecha_caducidad;
        $producto->alerta_caducidad = $request->alerta_caducidad;
        $producto->dias_caducidad = $request->dias_caducidad;
        $producto->alerta_canje = $request->alerta_canje;
        $producto->dias_canje = $request->dias_canje;
        $producto->vacuna = $request->vacuna;
        $producto->user_id = Auth::user()->id;
        $producto->save();

        if ($request->filled('empaque_presentacion_id')) {

            $producto->presentacion()->updateOrCreate(
                [
                    'producto_id' => $producto->id
                ],
                [
                    'empaque_presentacion_id' => $request->empaque_presentacion_id,
                    'presentacion_unidad_id' => $request->presentacion_unidad_id,
                    'cantidad' => $request->cantidad,
                ]
            );

        }

        return response()->json(["mensaje" => "Producto actualizado en la BD"], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
