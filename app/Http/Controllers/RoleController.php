<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $roles = Role::all();
        return $roles;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required|unique:roles',
        ]);

        $rol = new Role();
        $rol->name = $request->name;
        $rol->guard_name = "web";
        $rol->save();

        return response()->json(["mensaje" => "Rol registrado en la BD"], 200);
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
            'name' => 'required|unique:roles,name,' . $id,
        ]);

        $rol = Role::find($id);
        $rol->name = $request->name;
        $rol->guard_name = "web";
        $rol->save();

        return response()->json(["mensaje" => "Rol actualizado en la BD"], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
