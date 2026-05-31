<?php

namespace App\Http\Controllers;

use App\Models\AntropometricaMedida;
use App\Models\CapilarMedicion;
use App\Models\NeurologicaValoracion;
use App\Models\SignosVitale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SignosVitaleController extends Controller
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

        $request->validate([
            'atencion_id' => 'required',
            'atencion_formulario_id' => 'required',
            'paciente_id' => 'required',
            'area_salud_id' => 'required',
            'signosVitales.presion_arterial_sistolica' => 'required|numeric', //required|integer|min:70|max:200
            'signosVitales.presion_arterial_diastolica' => 'required|numeric', //required|integer|min:40|max:130
            'signosVitales.temperatura' => 'required|numeric', //required|numeric|min:34|max:42
            'signosVitales.frecuencia_respiratoria' => 'required|numeric',
            'signosVitales.frecuencia_cardiaca' => 'required|numeric', //required|integer|min:30|max:200
            'signosVitales.saturacion_oxigeno' => 'required|numeric',
            'antropometricasMedidas.peso' => 'required|numeric',
            'antropometricasMedidas.talla_estatura' => 'required|numeric',
            'antropometricasMedidas.tallaje' => 'required',
        ]);

        DB::beginTransaction();

        try {

            $signosVitales = new SignosVitale();
            $signosVitales->atencion_id = $request->atencion_id;
            $signosVitales->atencion_formulario_id = $request->atencion_formulario_id;
            $signosVitales->paciente_id = $request->paciente_id;
            //$signosVitales->preparacion_id = $preparacion->id;
            $signosVitales->area_salud_id = $request->area_salud_id;
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
            $antropometricasM->atencion_id = $request->atencion_id;
            $antropometricasM->atencion_formulario_id = $request->atencion_formulario_id;
            $antropometricasM->paciente_id = $request->paciente_id;
            //$antropometricasM->preparacion_id = $preparacion->id;
            $antropometricasM->area_salud_id = $request->area_salud_id;
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
            $capilarM->atencion_id = $request->atencion_id;
            $capilarM->atencion_formulario_id = $request->atencion_formulario_id;
            $capilarM->paciente_id = $request->paciente_id;
            //$capilarM->preparacion_id = $preparacion->id;
            $capilarM->area_salud_id = $request->area_salud_id;
            $capilarM->fecha = date("Y-m-d H:i:s");
            $capilarM->glucosa_capilar = $request->capilarMedicions["glucosa_capilar"] ?? null;
            $capilarM->tiempo_llenado_capilar = $request->capilarMedicions["tiempo_llenado_capilar"] ?? null;
            $capilarM->user_id = Auth::user()->id;
            $capilarM->save();

            $neurologicaV = new NeurologicaValoracion();
            $neurologicaV->atencion_id = $request->atencion_id;
            $neurologicaV->atencion_formulario_id = $request->atencion_formulario_id;
            $neurologicaV->paciente_id = $request->paciente_id;
            $neurologicaV->area_salud_id = $request->area_salud_id;
            $neurologicaV->fecha = date("Y-m-d H:i:s");
            $neurologicaV->glasgow_ocular = $request->neurologica_valoracion["glasgow_ocular"] ?? null;
            $neurologicaV->glasgow_verbal = $request->neurologica_valoracion["glasgow_verbal"] ?? null;
            $neurologicaV->glasgow_motora = $request->neurologica_valoracion["glasgow_motora"] ?? null;
            $neurologicaV->reaccion_pupilar_derecha = $request->neurologica_valoracion["reaccion_pupilar_derecha"] ?? null;
            $neurologicaV->reaccion_pupilar_izquierda = $request->neurologica_valoracion["reaccion_pupilar_izquierda"] ?? null;
            $neurologicaV->user_id = Auth::user()->id;
            $neurologicaV->save();

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
    public function show($id)
    {
        //
        $signosVitales = SignosVitale::where('preparacion_id', $id)->first();
        return response()->json($signosVitales, 200);
    }

    public function getSignosVitaleMedico($id)
    {
        //
        $signosVitales = SignosVitale::where('atencion_formulario_id', $id)->first();
        return response()->json($signosVitales, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'atencion_id' => 'required',
            'atencion_formulario_id' => 'required',
            'paciente_id' => 'required',
            'area_salud_id' => 'required',
            'signosVitales.presion_arterial_sistolica' => 'required|numeric', //required|integer|min:70|max:200
            'signosVitales.presion_arterial_diastolica' => 'required|numeric', //required|integer|min:40|max:130
            'signosVitales.temperatura' => 'required|numeric', //required|numeric|min:34|max:42
            'signosVitales.frecuencia_respiratoria' => 'required|numeric',
            'signosVitales.frecuencia_cardiaca' => 'required|numeric', //required|integer|min:30|max:200
            'signosVitales.saturacion_oxigeno' => 'required|numeric',
            'antropometricasMedidas.peso' => 'required|numeric',
            'antropometricasMedidas.talla_estatura' => 'required|numeric',
            'antropometricasMedidas.tallaje' => 'required',
        ]);

        DB::beginTransaction();

        try {

            $signosVitales = SignosVitale::findOrFail($request->signosVitales["id"]);
            $signosVitales->atencion_id = $request->atencion_id;
            $signosVitales->atencion_formulario_id = $request->atencion_formulario_id;
            $signosVitales->paciente_id = $request->paciente_id;
            //$signosVitales->preparacion_id = $preparacion->id;
            $signosVitales->area_salud_id = $request->area_salud_id;
            //$signosVitales->fecha = date("Y-m-d H:i:s");
            $signosVitales->presion_arterial_sistolica = $request->signosVitales["presion_arterial_sistolica"];
            $signosVitales->presion_arterial_diastolica = $request->signosVitales["presion_arterial_diastolica"];
            $signosVitales->presion_arterial_media = $request->signosVitales["presion_arterial_media"];
            $signosVitales->temperatura = $request->signosVitales["temperatura"];
            $signosVitales->frecuencia_respiratoria = $request->signosVitales["frecuencia_respiratoria"];
            $signosVitales->frecuencia_cardiaca = $request->signosVitales["frecuencia_cardiaca"];
            $signosVitales->saturacion_oxigeno = $request->signosVitales["saturacion_oxigeno"];
            $signosVitales->user_id = Auth::user()->id;
            $signosVitales->save();


            $antropometricasM = AntropometricaMedida::findOrFail($request->antropometricasMedidas["id"]);
            $antropometricasM->atencion_id = $request->atencion_id;
            $antropometricasM->atencion_formulario_id = $request->atencion_formulario_id;
            $antropometricasM->paciente_id = $request->paciente_id;
            //$antropometricasM->preparacion_id = $preparacion->id;
            $antropometricasM->area_salud_id = $request->area_salud_id;
            //$antropometricasM->fecha = date("Y-m-d H:i:s");
            $antropometricasM->peso = $request->antropometricasMedidas["peso"];
            $antropometricasM->talla_estatura = $request->antropometricasMedidas["talla_estatura"];
            $antropometricasM->tallaje = $request->antropometricasMedidas["tallaje"];
            $antropometricasM->imc = $request->antropometricasMedidas["imc"];
            $antropometricasM->perimetro_abdominal = $request->antropometricasMedidas["perimetro_abdominal"];
            $antropometricasM->perimetro_cefalico = $request->antropometricasMedidas["perimetro_cefalico"];
            $antropometricasM->user_id = Auth::user()->id;
            $antropometricasM->save();


            $capilarM = CapilarMedicion::findOrFail($request->capilarMedicions["id"]);
            $capilarM->atencion_id = $request->atencion_id;
            $capilarM->atencion_formulario_id = $request->atencion_formulario_id;
            $capilarM->paciente_id = $request->paciente_id;
            //$capilarM->preparacion_id = $preparacion->id;
            $capilarM->area_salud_id = $request->area_salud_id;
            //$capilarM->fecha = date("Y-m-d H:i:s");
            $capilarM->glucosa_capilar = $request->capilarMedicions["glucosa_capilar"] ?? null;
            $capilarM->tiempo_llenado_capilar = $request->capilarMedicions["tiempo_llenado_capilar"] ?? null;
            $capilarM->user_id = Auth::user()->id;
            $capilarM->save();

            $neurologicaV = NeurologicaValoracion::findOrFail($request->neurologica_valoracion["id"]);
            $neurologicaV->atencion_id = $request->atencion_id;
            //$neurologicaV->atencion_formulario_id = $request->atencion_formulario_id;
            $neurologicaV->paciente_id = $request->paciente_id;
            $neurologicaV->area_salud_id = $request->area_salud_id;
            //$neurologicaV->fecha = date("Y-m-d H:i:s");
            $neurologicaV->glasgow_ocular = $request->neurologica_valoracion["glasgow_ocular"] ?? null;
            $neurologicaV->glasgow_verbal = $request->neurologica_valoracion["glasgow_verbal"] ?? null;
            $neurologicaV->glasgow_motora = $request->neurologica_valoracion["glasgow_motora"] ?? null;
            $neurologicaV->reaccion_pupilar_derecha = $request->neurologica_valoracion["reaccion_pupilar_derecha"] ?? null;
            $neurologicaV->reaccion_pupilar_izquierda = $request->neurologica_valoracion["reaccion_pupilar_izquierda"] ?? null;
            $neurologicaV->user_id = Auth::user()->id;
            $neurologicaV->save();

            DB::commit();

            return response()->json(["mensaje" => "Registrado"], 201);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(["mensaje" => "Ocurrió error al registrar", "error" => $e->getMessage()], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
