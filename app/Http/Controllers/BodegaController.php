<?php

namespace App\Http\Controllers;

use App\Models\Bodega;
use App\Models\BodegaTransaccionUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BodegaController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $bodegas = Bodega::orderBy('id', 'asc')
            ->with(['almacenamientoTipo', 'bodegaTipo','bodegaGrupo'])->get();
        return response()->json($bodegas, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nombre' => 'required|unique:bodegas',
            'almacenamiento_tipo_id' => 'required',
            'bodega_tipo_id' => 'required',
            'bodega_grupo_id' => 'required',

        ]);

        $bodega = new Bodega();
        $bodega->nombre = $request->nombre;
        $bodega->almacenamiento_tipo_id = $request->almacenamiento_tipo_id;
        $bodega->bodega_tipo_id = $request->bodega_tipo_id;
        $bodega->bodega_grupo_id = $request->bodega_grupo_id;
        $bodega->observacion = $request->observacion;
        $bodega->vacuna = $request->vacuna;
        $bodega->user_id = Auth::user()->id;
        $bodega->save();

        return response()->json(["mensaje" => "Bodega registrado en la BD"], 200);
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
            'nombre' => 'required|unique:bodegas,nombre,' . $id,
            'almacenamiento_tipo_id' => 'required',
            'bodega_tipo_id' => 'required',
            'bodega_grupo_id' => 'required',
        ]);

        $bodega = Bodega::find($id);
        $bodega->nombre = $request->nombre;
        $bodega->almacenamiento_tipo_id = $request->almacenamiento_tipo_id;
        $bodega->bodega_tipo_id = $request->bodega_tipo_id;
        $bodega->bodega_grupo_id = $request->bodega_grupo_id;
        $bodega->observacion = $request->observacion;
        $bodega->vacuna = $request->vacuna;
        $bodega->user_id = Auth::user()->id;
        $bodega->save();

        return response()->json(["mensaje" => "Bodega actualizado en la BD"], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function transaccionesPermitidas(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'bodega_id' => 'required|exists:bodegas,id'
        ]);

        $transacciones = BodegaTransaccionUser::where('user_id', $request->user_id)
            ->where('bodega_id', $request->bodega_id)
            ->with('transaccion', 'transaccion.tipoTransaccion')
            ->get()
            ->pluck('transaccion')
            ->values();

        return response()->json($transacciones);
    }


    public function storeAsociacionUser(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'bodega_id' => 'required|exists:bodegas,id',
            'transacciones' => 'required|array',
        ]);

        $userId = $request->user_id;
        $bodegaId = $request->bodega_id;
        $transacciones = $request->transacciones;

        // Limpiar permisos anteriores
        /*DB::table('bodega_transaccion_users')
            ->where('user_id', $userId)
            ->where('bodega_id', $bodegaId)
            ->delete();

        $data = [];

        foreach ($transacciones as $t) {
            $data[] = [
                'user_id' => $userId,
                'bodega_id' => $bodegaId,
                'transaccion_id' => $t['id'],  // ⬅ ESTE ES EL QUE NECESITAS
            ];
        }

        DB::table('bodega_transaccion_users')->insert($data);
        */

        //simula syncWithoutDetaching
        /*
        foreach ($transacciones as $t) {
            BodegaTransaccionUser::firstOrCreate([
                'user_id' => $userId,
                'bodega_id' => $bodegaId,
                'transaccion_id' => $t['id'],
            ]);
        }*/

        // simula sync

        $ids = collect($transacciones)->pluck('id');

        // Eliminar las transacciones que NO están en el array recibido
        BodegaTransaccionUser::where('user_id', $userId)
            ->where('bodega_id', $bodegaId)
            ->whereNotIn('transaccion_id', $ids)
            ->delete();

        // Insertar las nuevas sin duplicar
        foreach ($ids as $transId) {
            BodegaTransaccionUser::firstOrCreate([
                'user_id' => $userId,
                'bodega_id' => $bodegaId,
                'transaccion_id' => $transId,
            ]);
        }

        return response()->json([
            'message' => 'Permisos guardados correctamente',
            //'count' => count($data)
        ]);
    }

    /*public function updateAsociacionUser(Request $request)
    {

        $request->validate([
            'user_id' => 'required|exists:users,id',
            'bodega_id' => 'required|exists:bodegas,id',
            'transacciones' => 'required|array',
        ]);

        $userId = $request->user_id;
        $bodegaId = $request->bodega_id;
        $transacciones = $request->transacciones;

        $ids = collect($transacciones)->pluck('id');

        // Eliminar las transacciones que NO están en el array recibido
        BodegaTransaccionUser::where('user_id', $userId)
            ->where('bodega_id', $bodegaId)
            ->whereNotIn('transaccion_id', $ids)
            ->delete();

        // Insertar las nuevas sin duplicar
        foreach ($ids as $transId) {
            BodegaTransaccionUser::firstOrCreate([
                'user_id' => $userId,
                'bodega_id' => $bodegaId,
                'transaccion_id' => $transId,
            ]);
        }
    }*/
    /*public function usuariosTransacciones($id)
    {
        $transacciones = BodegaTransaccionUser::where('bodega_id', $id)
            ->with('user', 'transaccion', 'transaccion.tipoTransaccion')
            ->get();

        // Agrupar transacciones por usuario
        $usuariosAgrupados = $transacciones->groupBy('user_id');

        $data = [];

        foreach ($usuariosAgrupados as $userId => $items) {

            $user = $items->first()->user; // mismo usuario

            $children = $items->map(function ($item) {
                $t = $item->transaccion;

                return [
                    'key' => "trans-" . $t->id,
                    'data' => [
                        'nombre' => $t->nombre,
                        'codigo' => $t->codigo,
                        'tipo' => $t->tipoTransaccion->nombre ?? '',
                    ]
                ];
            });

            // nodo padre (usuario)
            $data[] = [
                'key' => "user-" . $user->id,
                'data' => [
                    'nombre' => $user->name,
                    'email' => $user->email,
                    'tipo' => 'Usuario'
                ],
                'children' => $children
            ];
        }

        return response()->json($data);
    }*/

    public function usuariosTransacciones($id)
    {
        $transacciones = BodegaTransaccionUser::where('bodega_id', $id)
            ->with('user', 'transaccion', 'transaccion.tipoTransaccion')
            ->get();

        // Agrupar por usuario
        $grupo = $transacciones->groupBy('user_id');

        $data = [];

        foreach ($grupo as $userId => $items) {

            $user = $items->first()->user;

            $children = $items->map(function ($item) {
                $t = $item->transaccion;

                return [
                    'key' => "trans-" . $t->id,
                    'data' => [
                        'esPadre' => false,
                        'nombre' => $t->nombre,
                        'tipo' => $t->tipoTransaccion->nombre ?? '',
                    ]
                ];
            });

            // Nodo padre (usuario)
            $data[] = [
                'key' => "user-" . $user->id,
                'data' => [
                    'esPadre' => true,
                    'nombre' => $user->name,
                    'email' => $user->email,
                ],
                'children' => $children,
            ];
        }

        return response()->json($data);
    }
}
