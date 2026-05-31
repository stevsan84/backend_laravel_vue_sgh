<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PacienteController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        //$pacientes = Paciente::all();
        //return response()->json($pacientes, 200);

        $limit = isset($request->limit) ? $request->limit : 10;
        if (isset($request->q)) {

            //busquedad normal
            /*$pacientes = Paciente::orderBy('id', 'desc')
                ->where('nombre_primero', 'LIKE', '%' . $request->q . '%')
                ->orWhere('identificacion_code', 'LIKE', '%' . $request->q . '%')
                ->orWhere('apellido_primero', 'LIKE', '%' . $request->q . '%')
                //->with(['categoria'])
                ->paginate($limit);*/

            //BUSQUEDAD PEPILA
            /*$pacientes = Paciente::orderBy('id', 'desc')
                ->where(function ($query) use ($request) {
                    // Dividir el término de búsqueda en partes
                    $searchTerms = explode(' ', $request->q);

                    // Buscar en los campos que contienen el nombre completo
                    foreach ($searchTerms as $index => $term) {
                        if ($index == 0) {
                            // El primer término será obligatorio que aparezca en al menos un campo
                            $query->where(function ($query) use ($term) {
                                $query->where('nombre_primero', 'LIKE', '%' . $term . '%')
                                    ->orWhere('nombre_segundo', 'LIKE', '%' . $term . '%')
                                    ->orWhere('apellido_primero', 'LIKE', '%' . $term . '%')
                                    ->orWhere('apellido_segundo', 'LIKE', '%' . $term . '%')
                                    ->orWhere('identificacion_code', 'LIKE', '%' . $term . '%');
                            });
                        } else {
                            // Asegurar que los siguientes términos también estén presentes
                            $query->where(function ($query) use ($term) {
                                $query->where('nombre_primero', 'LIKE', '%' . $term . '%')
                                    ->orWhere('nombre_segundo', 'LIKE', '%' . $term . '%')
                                    ->orWhere('apellido_primero', 'LIKE', '%' . $term . '%')
                                    ->orWhere('apellido_segundo', 'LIKE', '%' . $term . '%')
                                    ->orWhere('identificacion_code', 'LIKE', '%' . $term . '%');
                            });
                        }
                    }
                })
                ->with(['identificacionTipo'])
                ->paginate($limit);*/

            $pacientes = Paciente::orderBy('id', 'desc')
                ->where(function ($query) use ($request) {
                    $searchTerms = explode(' ', $request->q);

                    foreach ($searchTerms as $index => $term) {
                        $term = strtolower($term); // Convierte el término a minúsculas

                        $query->where(function ($subquery) use ($term) {
                            $subquery->whereRaw("unaccent(lower(nombre_primero)) LIKE unaccent(lower(?))", ["%{$term}%"])
                                ->orWhereRaw("unaccent(lower(nombre_segundo)) LIKE unaccent(lower(?))", ["%{$term}%"])
                                ->orWhereRaw("unaccent(lower(apellido_primero)) LIKE unaccent(lower(?))", ["%{$term}%"])
                                ->orWhereRaw("unaccent(lower(apellido_segundo)) LIKE unaccent(lower(?))", ["%{$term}%"])
                                ->orWhereRaw("unaccent(lower(identificacion_code)) LIKE unaccent(lower(?))", ["%{$term}%"]);
                        });
                    }
                })
                ->with(['identificacionTipo'])
                ->paginate($limit);

            return response()->json($pacientes, 200);
        } else {
            $pacientes = Paciente::orderBy('id', 'desc')
                ->with(['identificacionTipo'])
                ->paginate($limit);

            return response()->json($pacientes, 200);
        }
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
            'identificacion_code' => 'required|unique:pacientes',
            'sexo' => 'required',
            'estado_civil' => 'required',
            'fecha_nacimiento' => 'required',
            'identificacion_tipo_id' => 'required',
            'pais_id' => 'required',
            'sector' => 'required',
            'calle_principal' => 'required',
            'referencia' => 'required',
            'educacion_nivel_id' => 'required',
            'educacion_estado_nivel_id' => 'required',
            'empresa_tipo_trabajo' => 'required',
            'ocupacion_profesion' => 'required',
            'empresa_nombre_trabajo' => 'required',
            //'bono_solidario_id' => 'required',
            'discapacidad' => 'required',
            'contacto_referencia' => 'required',
            'familiar_parentesco_id' => 'required',
            'salud_seguro_id' => 'required',
            'etnico_grupo_id' => 'required',
        ]);

        $paciente = new Paciente();
        $paciente->identificacion_tipo_id = $request->identificacion_tipo_id;
        $paciente->identificacion_code = $request->identificacion_code;
        $paciente->nombre_primero = $request->nombre_primero;
        $paciente->nombre_segundo = $request->nombre_segundo;
        $paciente->apellido_primero = $request->apellido_primero;
        $paciente->apellido_segundo = $request->apellido_segundo;
        $paciente->estado_civil = $request->estado_civil;
        $paciente->sexo = $request->sexo;
        $paciente->telefono_fijo = $request->telefono_fijo;
        $paciente->telefono_celular = $request->telefono_celular;
        $paciente->email = $request->email;

        $paciente->nacionalidad_id = $request->nacionalidad_id;
        $paciente->fecha_nacimiento = $request->fecha_nacimiento;
        $paciente->nacimiento_lugar = $request->nacimiento_lugar;

        $paciente->pais_id = $request->pais_id;
        $paciente->provincia_id = $request->provincia_id;
        $paciente->canton_id = $request->canton_id;
        $paciente->parroquia_id = $request->parroquia_id;
        $paciente->sector = $request->sector;
        $paciente->calle_principal = $request->calle_principal;
        $paciente->calle_secundaria = $request->calle_secundaria;
        $paciente->numero = $request->numero;
        $paciente->referencia = $request->referencia;


        $paciente->etnico_grupo_id = $request->etnico_grupo_id;
        $paciente->indigena_nacionalidad_id = $request->indigena_nacionalidad_id;
        $paciente->indigena_pueblo_id = $request->indigena_pueblo_id;
        $paciente->educacion_nivel_id = $request->educacion_nivel_id;
        $paciente->educacion_estado_nivel_id = $request->educacion_estado_nivel_id;
        $paciente->empresa_tipo_trabajo = $request->empresa_tipo_trabajo;
        $paciente->ocupacion_profesion = $request->ocupacion_profesion;
        $paciente->empresa_nombre_trabajo = $request->empresa_nombre_trabajo;
        $paciente->salud_seguro_id = $request->salud_seguro_id;
        $paciente->salud_seguro_secundario = $request->salud_seguro_secundario;
        //$paciente->bono_solidario_id = $request->bono_solidario_id;
        $paciente->discapacidad = $request->discapacidad;

        $paciente->contacto_referencia = $request->contacto_referencia;
        $paciente->familiar_parentesco_id = $request->familiar_parentesco_id;
        $paciente->telefono_contacto = $request->telefono_contacto;
        $paciente->direccion = $request->direccion;

        $paciente->user_id = Auth::user()->id;
        $paciente->save();

        return response()->json(["mensaje" => "Paciente registrada en la BD"], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
         $paciente =  Paciente::with(['identificacionTipo',
                                'nacionalidad',
                                'pais',
                                'provincia',
                                'canton',
                                'parroquia',
                                'etnicoGrupo',
                                'indigenaNacionalidad',
                                'indigenaPueblo',
                                'educacionNivel',
                                'educacionEstadoNivel',
                                'saludSeguro',
                                //'bonoSolidario',
                                'familiarParentesco'])
                                ->findOrFail($id);

        return response()->json($paciente, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'nombre_primero' => 'required',
            'apellido_primero' => 'required',
            'nacionalidad_id' => 'required',
            'provincia_id' => 'required',
            'canton_id' => 'required',
            'parroquia_id' => 'required',
            'identificacion_code' => 'required|unique:pacientes,identificacion_code,' . $id,
            'sexo' => 'required',
            'estado_civil' => 'required',
            'fecha_nacimiento' => 'required',
            'identificacion_tipo_id' => 'required',
            'pais_id' => 'required',
            'sector' => 'required',
            'calle_principal' => 'required',
            'referencia' => 'required',
            'educacion_nivel_id' => 'required',
            'educacion_estado_nivel_id' => 'required',
            'empresa_tipo_trabajo' => 'required',
            'ocupacion_profesion' => 'required',
            'empresa_nombre_trabajo' => 'required',
            //'bono_solidario_id' => 'required',
            'discapacidad' => 'required',
            'contacto_referencia' => 'required',
            'familiar_parentesco_id' => 'required',
            'salud_seguro_id' => 'required',
            'etnico_grupo_id' => 'required',
        ]);

        $paciente =  Paciente::find($id);
        $paciente->identificacion_tipo_id = $request->identificacion_tipo_id;
        $paciente->identificacion_code = $request->identificacion_code;
        $paciente->nombre_primero = $request->nombre_primero;
        $paciente->nombre_segundo = $request->nombre_segundo;
        $paciente->apellido_primero = $request->apellido_primero;
        $paciente->apellido_segundo = $request->apellido_segundo;
        $paciente->estado_civil = $request->estado_civil;
        $paciente->sexo = $request->sexo;
        $paciente->telefono_fijo = $request->telefono_fijo;
        $paciente->telefono_celular = $request->telefono_celular;
        $paciente->email = $request->email;

        $paciente->nacionalidad_id = $request->nacionalidad_id;
        $paciente->fecha_nacimiento = $request->fecha_nacimiento;
        $paciente->nacimiento_lugar = $request->nacimiento_lugar;

        $paciente->pais_id = $request->pais_id;
        $paciente->provincia_id = $request->provincia_id;
        $paciente->canton_id = $request->canton_id;
        $paciente->parroquia_id = $request->parroquia_id;
        $paciente->sector = $request->sector;
        $paciente->calle_principal = $request->calle_principal;
        $paciente->calle_secundaria = $request->calle_secundaria;
        $paciente->numero = $request->numero;
        $paciente->referencia = $request->referencia;


        $paciente->etnico_grupo_id = $request->etnico_grupo_id;
        $paciente->indigena_nacionalidad_id = $request->indigena_nacionalidad_id;
        $paciente->indigena_pueblo_id = $request->indigena_pueblo_id;
        $paciente->educacion_nivel_id = $request->educacion_nivel_id;
        $paciente->educacion_estado_nivel_id = $request->educacion_estado_nivel_id;
        $paciente->empresa_tipo_trabajo = $request->empresa_tipo_trabajo;
        $paciente->ocupacion_profesion = $request->ocupacion_profesion;
        $paciente->empresa_nombre_trabajo = $request->empresa_nombre_trabajo;
        $paciente->salud_seguro_id = $request->salud_seguro_id;
        $paciente->salud_seguro_secundario = $request->salud_seguro_secundario;
        //$paciente->bono_solidario_id = $request->bono_solidario_id;
        $paciente->discapacidad = $request->discapacidad;

        $paciente->contacto_referencia = $request->contacto_referencia;
        $paciente->familiar_parentesco_id = $request->familiar_parentesco_id;
        $paciente->telefono_contacto = $request->telefono_contacto;
        $paciente->direccion = $request->direccion;

        $paciente->user_id = Auth::user()->id;
        $paciente->save();

        return response()->json(["mensaje" => "Paciente actualizado en la BD"], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
