<?php

namespace App\Http\Controllers;

use App\Models\AdmisionPaciente;
use App\Models\Antecedente;
use App\Models\AntropometricaMedida;
use App\Models\CapilarMedicion;
use App\Models\EventoTipo;
use App\Models\Evolucion;
use App\Models\Formulario008Antecedente;
use App\Models\Formulario008Evento;
use App\Models\Formulario008InicioAtencion;
use App\Models\NeurologicaValoracion;
use App\Models\SignosVitale;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Formulario008InicioAtencionController extends Controller
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
            'atencion.condicion_llegada' => 'required',
            'atencion.motivo_atencion' => 'required',
        ]);

        $formularioInicio = new Formulario008InicioAtencion();
        $formularioInicio->atencion_id = $request->atencion_id;
        $formularioInicio->atencion_formulario_id = $request->atencion_formulario_id;
        $formularioInicio->paciente_id = $request->paciente_id;
        $formularioInicio->area_salud_id = $request->area_salud_id;

        $formularioInicio->fecha_inicio = date("Y-m-d H:i:s");
        $formularioInicio->condicion_llegada = $request->atencion["condicion_llegada"];
        $formularioInicio->motivo_atencion = $request->atencion["motivo_atencion"];
        $formularioInicio->user_id = Auth::user()->id;
        $formularioInicio->save();

        return response()->json(["mensaje" => "Inicio de Atencion guardado"], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $formularioInicio = Formulario008InicioAtencion::where('atencion_formulario_id', $id)->first();
        return response()->json($formularioInicio, 200);
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
            'atencion.condicion_llegada' => 'required',
            'atencion.motivo_atencion' => 'required',
        ]);

        $formularioInicio = Formulario008InicioAtencion::findOrFail($id);
        $formularioInicio->atencion_id = $request->atencion_id;
        $formularioInicio->atencion_formulario_id = $request->atencion_formulario_id;
        $formularioInicio->paciente_id = $request->paciente_id;
        $formularioInicio->area_salud_id = $request->area_salud_id;

        //$formularioInicio->fecha_inicio = date("Y-m-d H:i:s");
        $formularioInicio->condicion_llegada = $request->atencion["condicion_llegada"];
        $formularioInicio->motivo_atencion = $request->atencion["motivo_atencion"];
        $formularioInicio->user_id = Auth::user()->id;
        $formularioInicio->save();

        return response()->json(["mensaje" => "Inicio de Atencion guardado"], 200);
    }

    public function funReportePDF($id)
    {
        $admision = AdmisionPaciente::with(['user'])
            ->where('atencion_formulario_id', $id)->first();

        $formulario = Formulario008InicioAtencion::where('atencion_formulario_id', $id)->first();

        $formulario->fechaI = \Carbon\Carbon::parse($formulario->fecha_inicio)->format('d/m/Y');
        $formulario->horaI = \Carbon\Carbon::parse($formulario->fecha_inicio)->format('H:i');

        $formularioEvento = Formulario008Evento::where('atencion_formulario_id', $id)
            ->with('eventoTipos')
            ->first();

        $accidente = EventoTipo::where('evento_id', 1)->get();
        $violencia = EventoTipo::where('evento_id', 2)->get();
        $intoxicacion = EventoTipo::where('evento_id', 3)->get();

        if ($formularioEvento) {
            //$formularioEvento->fechaE = \Carbon\Carbon::parse($formularioEvento->fecha)->format('d/m/Y');
            $formularioEvento->fechaE = $formularioEvento->fecha
                ? \Carbon\Carbon::parse($formularioEvento->fecha)->format('d/m/Y')
                : null;
            //$formularioEvento->horaE = \Carbon\Carbon::parse($formularioEvento->fecha)->format('H:i');
            $formularioEvento->horaE = $formularioEvento->fecha
                ? \Carbon\Carbon::parse($formularioEvento->fecha)->format('d/m/Y')
                : null;
            //$tiposSeleccionados = $formularioEvento->eventoTipos->pluck('id')->toArray();
            $tiposSeleccionados = $formularioEvento
                ? $formularioEvento->eventoTipos->pluck('id')->toArray()
                : []; // array vacío por defecto
        } else {
            //$formularioEvento->fechaE = null;
            //$formularioEvento->horaE = null;
            $tiposSeleccionados = []; // array vacío por defecto

        }

        $formularioAntecedente = Formulario008Antecedente::where('atencion_formulario_id', $id)
            ->with('antecedentes')
            ->first();
        $antecedentes = Antecedente::all();

        if ($formularioAntecedente) {
            $antecedenteSeleccionados = $formularioAntecedente->antecedentes->pluck('id')->toArray();
        } else {
            $antecedenteSeleccionados = []; // array vacío por defecto
        }

        $formularioEvolucion = Evolucion::where('atencion_formulario_id', $id)->first();
        //dd($formularioEvolucion);

        $formularioSignos = SignosVitale::where('atencion_formulario_id', $id)->first();

        if ($formularioSignos) {
            $formularioSignos->presion_arterial = (int) $formularioSignos->presion_arterial_sistolica . '/' . (int) $formularioSignos->presion_arterial_diastolica;
        }

        $formularioAntropometica = AntropometricaMedida::where('atencion_formulario_id', $id)->first();

        $formularioCapilar = CapilarMedicion::where('atencion_formulario_id', $id)->first();

        $formularioNeurolica = NeurologicaValoracion::where('atencion_formulario_id', $id)->first();

        $pdf = Pdf::loadView('pdf.form008', compact([
            'admision',
            'formulario',
            'formularioEvento',
            'accidente',
            'violencia',
            'intoxicacion',
            'tiposSeleccionados',
            'formularioAntecedente',
            'antecedenteSeleccionados',
            'antecedentes',
            'formularioEvolucion',
            'formularioSignos',
            'formularioAntropometica',
            'formularioCapilar',
            'formularioNeurolica'

        ]));

        return $pdf->stream();

        /*$pedido = Pedido::with(["cliente","productos"])->find($id);

        $pdf = Pdf::loadView('pdf.form008',["pedido" => $pedido] );
        //return $pdf->download('pedidos.pdf');
        return $pdf->stream();*/

        //return response($pdf->output(), 200)
        //->header('Content-Type', 'application/pdf')
        //->header('Content-Disposition', 'inline; filename="ticket_pedido_'.$id.'.pdf"');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
