<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    public function funListar(){
        //$users = DB::select("select * from users"); //hacer consultas sql
        
        //Query Builder
        //$users = DB::table("users")->get();
        //$users = DB::table("users")->select("name")->get();

        //Eloquente ORM
        $users = User::with('roles')->get();

        return $users;
    }

    public function funBuscar(Request $request){

        $search = strtolower($request->search);
        $users =  User::whereRaw("unaccent(lower(name)) LIKE unaccent(lower(?))", ["%{$search}%"])
            ->orderBy('name')
            ->limit(20)
            ->get();
            //->get(['id', 'nombre']);
        
        return response()->json($users , 200);
    }

    public function funGuardar(Request $request){

        //validar datos personles y usuario
        $request->validate([
            "name" => "required|string",
            "email" => "required|email|unique:users",
            "password" => "required|min:6|string",
            'role'=>'required',
        ]);

        try{
    
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request['password']);
    
            $user->save();

            $user->assignRole($request->role);
    
            return response()->json(["mensaje" => "Usuario registrado en la BD"], 200);

        }catch(\Exception $e) {
            DB::rollBack();
            return response()->json(["mensaje" => "Error del Servidor", "error" => $e->getMessage()],500);
        }

       
        
    }

    public function funMostrar($id){
        //$user = User::find($id);
        $user = User::findOrFail($id);
        return response()->json($user,200);
    }

    public function funModificar(Request $request, $id){

        $request->validate([
            'name'=>'required',
            'email'=>'required|unique:users,email,'.$id,
            //'password'=>'confirmed',
            'role'=>'required',
        ]);

        $user = User::findOrFail($id);
        
        $user->name = $request->name;
        $user->email = $request->email;
        if($request->filled('password')){
            $user->password = Hash::make($request['password']);
        }

        $user->save();
        
        $user->syncRoles($request->role);
        
        return response()->json(["mensaje" => "Usuario Actualizado"],201);
    }

    public function funEliminar($id){
        //$user = User::findOrFail($id);
        //$user->delete();
        //return response()->json(["mensaje" => "Usuario Eliminado"],200);
    }
}

