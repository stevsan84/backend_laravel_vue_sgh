<?php

namespace App\Http\Controllers;

use App\Models\AdmisionPaciente;
use App\Models\AntropometricaMedida;
use App\Models\Atencion;
use App\Models\AtencionFormulario;
use App\Models\AtencionMovimiento;
use App\Models\CapilarMedicion;
use App\Models\Preparacion;
use App\Models\SignosVitale;
use App\Models\Paciente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PreparacionController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    public function storeEmergencia(Request $request)
    {
        //
        $request->validate([
            'admisionPaciente' => 'required',
            'signosVitales.presion_arterial_sistolica' => 'required|numeric', //required|integer|min:70|max:200
            'signosVitales.presion_arterial_diastolica' => 'required|numeric', //required|integer|min:40|max:130
            'signosVitales.temperatura' => 'required|numeric', //required|numeric|min:34|max:42
            'signosVitales.frecuencia_respiratoria' => 'required|numeric', 
            'signosVitales.frecuencia_cardiaca' => 'required|numeric', //required|integer|min:30|max:200
            'signosVitales.saturacion_oxigeno' => 'required|numeric',
            'antropometricasMedidas.peso' => 'required|numeric',
            'antropometricasMedidas.talla_estatura' => 'required|numeric',
            'antropometricasMedidas.tallaje' => 'required',
            'forma_llegada' => 'required',
            'manchester_triage_id' => 'required',
        ]);

        DB::beginTransaction();

        try {
            $atencion = new Atencion();
            $atencion->paciente_id = $request->admisionPaciente["id"];
            $atencion->area_salud_id = 2;
            $atencion->fecha_ingreso = date("Y-m-d H:i:s");
            $atencion->estado = 'preparacion';
            $atencion->area_salud_actual_id = 6;
            $atencion->save();


            $atencionM = new AtencionMovimiento();
            $atencionM->atencion_id = $atencion->id;
            $atencionM->area_salud_id = 6;
            $atencionM->fecha_ingreso = date("Y-m-d H:i:s");
            $atencionM->estado = 'activa';
            $atencionM->save();


            $atencionF = new AtencionFormulario();
            $atencionF->atencion_id = $atencion->id;
            $atencionF->formulario_id = 1;
            $atencionF->area_salud_id = 2;
            $atencionF->fecha_inicio = date("Y-m-d H:i:s");
            //$atencionF->estado = 'activo';
            $atencionF->user_id = Auth::user()->id;
            $atencionF->save();


            $preparacion = new Preparacion();
            $preparacion->fecha = date("Y-m-d H:i:s");
            $preparacion->atencion_id = $atencion->id;
            $preparacion->atencion_formulario_id = $atencionF->id;
            $preparacion->area_salud_id = 2;
            $preparacion->paciente_id = $request->admisionPaciente["id"];
            $preparacion->estado = 'preparacion';
            $preparacion->user_id = Auth::user()->id;
            $preparacion->save();


            $signosVitales = new SignosVitale();
            $signosVitales->atencion_id = $atencion->id;
            //$signosVitales->atencion_formulario_id = $atencionF->id;
            $signosVitales->paciente_id = $request->admisionPaciente["id"];
            $signosVitales->preparacion_id = $preparacion->id;
            $signosVitales->area_salud_id = 2;
            $signosVitales->fecha = date("Y-m-d H:i:s");
            $signosVitales->presion_arterial_sistolica = $request->signosVitales["presion_arterial_sistolica"];
            $signosVitales->presion_arterial_diastolica = $request->signosVitales["presion_arterial_diastolica"];
            $signosVitales->presion_arterial_media = $request->signosVitales["presion_arterial_media"];
            $signosVitales->temperatura = $request->signosVitales["temperatura"];
            $signosVitales->frecuencia_respiratoria = $request->signosVitales["frecuencia_respiratoria"];
            $signosVitales->frecuencia_cardiaca = $request->signosVitales["frecuencia_cardiaca"];
            $signosVitales->saturacion_oxigeno = $request->signosVitales["saturacion_oxigeno"];
            $signosVitales->user_id = Auth::user()->id;
            $signosVitales->save();


            $antropometricasM = new AntropometricaMedida();
            $antropometricasM->atencion_id = $atencion->id;
            //$antropometricasM->atencion_formulario_id = $atencionF->id;
            $antropometricasM->paciente_id = $request->admisionPaciente["id"];
            $antropometricasM->preparacion_id = $preparacion->id;
            $antropometricasM->area_salud_id = 2;
            $antropometricasM->fecha = date("Y-m-d H:i:s");
            $antropometricasM->peso = $request->antropometricasMedidas["peso"];
            $antropometricasM->talla_estatura = $request->antropometricasMedidas["talla_estatura"];
            $antropometricasM->tallaje = $request->antropometricasMedidas["tallaje"];
            $antropometricasM->imc = $request->antropometricasMedidas["imc"];
            $antropometricasM->perimetro_abdominal = $request->antropometricasMedidas["perimetro_abdominal"];
            $antropometricasM->perimetro_cefalico = $request->antropometricasMedidas["perimetro_cefalico"];
            $antropometricasM->user_id = Auth::user()->id;
            $antropometricasM->save();


            $capilarM = new CapilarMedicion();
            $capilarM->atencion_id = $atencion->id;
            //$capilarM->atencion_formulario_id = $atencionF->id;
            $capilarM->paciente_id = $request->admisionPaciente["id"];
            $capilarM->preparacion_id = $preparacion->id;
            $capilarM->area_salud_id = 2;
            $capilarM->fecha = date("Y-m-d H:i:s");
            $capilarM->glucosa_capilar = $request->capilarMedicions["glucosa_capilar"];
            $capilarM->hemoglobina = $request->capilarMedicions["hemoglobina"];
            $capilarM->user_id = Auth::user()->id;
            $capilarM->save();


            $admisionP = new AdmisionPaciente();
            $admisionP->atencion_id = $atencion->id;
            $admisionP->atencion_formulario_id = $atencionF->id;
            $admisionP->paciente_id = $request->admisionPaciente["id"];
            $admisionP->preparacion_id = $preparacion->id;
            $admisionP->area_salud_id = 2;
            $admisionP->fecha = date("Y-m-d H:i:s");
            $admisionP->identificacion_tipo_id = $request->admisionPaciente["identificacion_tipo"]["nombre"] ?? null;
            $admisionP->identificacion_code = $request->admisionPaciente["identificacion_code"];
            $admisionP->nombre_primero = $request->admisionPaciente["nombre_primero"];
            $admisionP->nombre_segundo = $request->admisionPaciente["nombre_segundo"];
            $admisionP->apellido_primero = $request->admisionPaciente["apellido_primero"];
            $admisionP->apellido_segundo = $request->admisionPaciente["apellido_segundo"];
            $admisionP->estado_civil = $request->admisionPaciente["estado_civil"];
            $admisionP->sexo = $request->admisionPaciente["sexo"];
            $admisionP->telefono_fijo = $request->admisionPaciente["telefono_fijo"];
            $admisionP->telefono_celular = $request->admisionPaciente["telefono_celular"];
            $admisionP->email = $request->admisionPaciente["email"];
            $admisionP->nacionalidad_id = $request->admisionPaciente["nacionalidad"]["nombre"] ?? null;
            $admisionP->fecha_nacimiento = $request->admisionPaciente["fecha_nacimiento"];
            $admisionP->nacimiento_lugar = $request->admisionPaciente["nacimiento_lugar"];
            $admisionP->pais_id = $request->admisionPaciente["pais"]["nombre"] ?? null;;
            $admisionP->provincia_id = $request->admisionPaciente["provincia"]["nombre"] ?? null;;
            $admisionP->canton_id = $request->admisionPaciente["canton"]["nombre"] ?? null;;
            $admisionP->parroquia_id = $request->admisionPaciente["parroquia"]["nombre"] ?? null;;
            $admisionP->sector = $request->admisionPaciente["sector"];
            $admisionP->calle_principal = $request->admisionPaciente["calle_principal"];
            $admisionP->calle_secundaria = $request->admisionPaciente["calle_secundaria"];
            $admisionP->numero = $request->admisionPaciente["numero"];
            $admisionP->referencia = $request->admisionPaciente["referencia"];
            $admisionP->etnico_grupo_id = $request->admisionPaciente["etnico_grupo"]["nombre"] ?? null;;
            $admisionP->indigena_nacionalidad_id = $request->admisionPaciente["indigena_nacionalidad"]["nombre"] ?? null;;
            $admisionP->indigena_pueblo_id = $request->admisionPaciente["indigena_pueblo"]["nombre"] ?? null;;
            $admisionP->educacion_nivel_id = $request->admisionPaciente["educacion_nivel"]["nombre"] ?? null;;
            $admisionP->educacion_estado_nivel_id = $request->admisionPaciente["educacion_estado_nivel"]["nombre"] ?? null;;
            $admisionP->empresa_tipo_trabajo = $request->admisionPaciente["empresa_tipo_trabajo"];
            $admisionP->ocupacion_profesion = $request->admisionPaciente["ocupacion_profesion"];
            $admisionP->empresa_nombre_trabajo = $request->admisionPaciente["empresa_nombre_trabajo"];
            $admisionP->salud_seguro_id = $request->admisionPaciente["salud_seguro"]["nombre"] ?? null;;
            $admisionP->salud_seguro_secundario = $request->admisionPaciente["salud_seguro_secundario"];
            $admisionP->bono_solidario_id = $request->admisionPaciente["bono_solidario"]["nombre"] ?? null;;
            $admisionP->discapacidad = $request->admisionPaciente["discapacidad"];
            $admisionP->contacto_referencia = $request->admisionPaciente["contacto_referencia"];
            $admisionP->familiar_parentesco_id = $request->admisionPaciente["familiar_parentesco"]["nombre"] ?? null;;
            $admisionP->telefono_contacto = $request->admisionPaciente["telefono_contacto"];
            $admisionP->direccion = $request->admisionPaciente["direccion"];
            $admisionP->forma_llegada = $request->forma_llegada;
            $admisionP->fuente_informacion = $request->admisionPaciente["fuente_informacion"];
            $admisionP->institucion_persona = $request->admisionPaciente["institucion_persona"];
            $admisionP->telefono = $request->admisionPaciente["telefono"];
            $admisionP->cita_tipo_id = 3;
            $admisionP->cita_subtipo_id = $request->cita_subtipo_id;
            $admisionP->manchester_triage_id = $request->manchester_triage_id["id"];
            $admisionP->user_id = Auth::user()->id;
            $admisionP->save();

            
            /*$formulario = new Formulario008();
            $formulario->atencion_id = $atencion->id;
            $formulario->atencion_formulario_id = $atencionF->id;
            $formulario->paciente_id = $request->admisionPaciente["id"];
            $formulario->preparacion_id = $preparacion->id;
            $formulario->area_salud_id = 2;
            $formulario->fecha = date("Y-m-d H:i:s");
            $formulario->save();*/


            DB::commit();

            return response()->json(["mensaje" => "Registrado"], 201);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(["mensaje" => "Ocurrió error al registrar", "error" => $e->getMessage()], 400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function getAgendaEmergencia()
    {
        //
         $pacientes = Preparacion::orderBy('id', 'desc')
                ->where('area_salud_id',2)
                ->where('estado','preparacion')
                ->with(['paciente.identificacionTipo'])
                ->get();

            return response()->json($pacientes, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
