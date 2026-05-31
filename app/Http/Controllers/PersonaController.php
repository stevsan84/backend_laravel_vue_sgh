<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PersonaController extends Controller
{
    //
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        //$personas = Persona::with(['user'])->orderBy('id','desc')->get();
        $personas = Persona::with(['user'])->get();

        return response()->json($personas, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
                'nombre_primero' => 'required',
                'apellido_primero' => 'required',
                'nacionalidad_id' => 'required',
                'provincia_id' => 'required',
                'canton_id' => 'required',
                'parroquia_id' => 'required',
                'identificacion_code' => 'required|unique:personas',
                'direccion' => 'required',
                'sexo' => 'required',
                'fecha_nacimiento' => 'required',
                'identificacion_tipo_id' => 'required',
                'etnico_grupo_id' => 'required',
                //'establecimiento_unidad_id' => 'required',
                'formacion_profesional_id' => 'required',
                'area_trabajo_id' => 'required',
        ]);

            $persona = new Persona();
            $persona->nombre_primero = $request->nombre_primero;
            $persona->nombre_segundo = $request->nombre_segundo;
            $persona->apellido_primero = $request->apellido_primero;
            $persona->apellido_segundo = $request->apellido_segundo;
            $persona->nacionalidad_id = $request->nacionalidad_id;
            $persona->provincia_id = $request->provincia_id;
            $persona->canton_id = $request->canton_id;
            $persona->parroquia_id = $request->parroquia_id;
            $persona->identificacion_code = $request->identificacion_code;
            $persona->direccion = $request->direccion;
            $persona->sexo = $request->sexo;
            $persona->telefono = $request->telefono;
            $persona->fecha_nacimiento = $request->fecha_nacimiento;
            $persona->email = $request->email;
            $persona->registro_profesional = $request->registro_profesional;
            $persona->identificacion_tipo_id = $request->identificacion_tipo_id;
            $persona->portafolio_servicio_id = $request->portafolio_servicio_id;
            $persona->etnico_grupo_id = $request->etnico_grupo_id;
            //$persona->establecimiento_unidad_id = $request->establecimiento_unidad_id;
            $persona->formacion_profesional_id= $request->formacion_profesional_id;
            $persona->especialidad_id = $request->especialidad_id;
            $persona->area_trabajo_id = $request->area_trabajo_id;
            $persona->observacion = $request->observacion;
            $persona->tratante = $request->tratante;
            $persona->user_id = Auth::user()->id;
            $persona->save();

            return response()->json(["mensaje" => "Persona registrada en la BD"], 200);
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
                'nombre_primero' => 'required',
                'apellido_primero' => 'required',
                'nacionalidad_id' => 'required',
                'provincia_id' => 'required',
                'canton_id' => 'required',
                'parroquia_id' => 'required',
                'identificacion_code' => 'required|unique:personas,identificacion_code,'.$id,
                'direccion' => 'required',
                'sexo' => 'required',
                'fecha_nacimiento' => 'required',
                'identificacion_tipo_id' => 'required',
                'etnico_grupo_id' => 'required',
                //'establecimiento_unidad_id' => 'required',
                'formacion_profesional_id' => 'required',
                'area_trabajo_id' => 'required',
        ]);

            $persona = Persona::find($id);
            $persona->nombre_primero = $request->nombre_primero;
            $persona->nombre_segundo = $request->nombre_segundo;
            $persona->apellido_primero = $request->apellido_primero;
            $persona->apellido_segundo = $request->apellido_segundo;
            $persona->nacionalidad_id = $request->nacionalidad_id;
            $persona->provincia_id = $request->provincia_id;
            $persona->canton_id = $request->canton_id;
            $persona->parroquia_id = $request->parroquia_id;
            $persona->identificacion_code = $request->identificacion_code;
            $persona->direccion = $request->direccion;
            $persona->sexo = $request->sexo;
            $persona->telefono = $request->telefono;
            $persona->fecha_nacimiento = $request->fecha_nacimiento;
            $persona->email = $request->email;
            $persona->registro_profesional = $request->registro_profesional;
            $persona->identificacion_tipo_id = $request->identificacion_tipo_id;
            $persona->portafolio_servicio_id = $request->portafolio_servicio_id;
            $persona->etnico_grupo_id = $request->etnico_grupo_id;
            //$persona->establecimiento_unidad_id = $request->establecimiento_unidad_id;
            $persona->formacion_profesional_id= $request->formacion_profesional_id;
            $persona->especialidad_id = $request->especialidad_id;
            $persona->area_trabajo_id = $request->area_trabajo_id;
            $persona->observacion = $request->observacion;
            $persona->tratante = $request->tratante;
            $persona->user_id = Auth::user()->id;
            $persona->save();

            return response()->json(["mensaje" => "Persona actualizada en la BD"], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function funAddUserPersona(Request $request, $id)
    {
        $request->validate([
            "name" => "required|string",
            "email" => "required|email|unique:users",
            "password" => "required|min:6|string",
            'role'=>'required',
        ]);


        DB::beginTransaction();

        try {
            $persona = Persona::find($id);

            //guadar user
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request['password']);

            $user->save();

            $user->assignRole($request->role);

            // asignamos la cuenta de usuario
            $persona->link_user_id = $user->id;
            //$persona->save();
            $persona->update();

            DB::commit();

            return response()->json(["mensaje" => "Cuenta asignada a la persona"], 201);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(["mensaje" => "Ocurrió error al asignar cuenta de usuario ", "error" => $e->getMessage()], 400);
        }
    }

    public function getPersonaPortafolio($portafolio)
    {
        //
        //$personas = Persona::with(['user'])->orderBy('id','desc')->get();
        $personas = Persona::where('portafolio_servicio_id',$portafolio)->get();

        return response()->json($personas, 200);
    }

}
