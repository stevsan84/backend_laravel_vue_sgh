<?php

namespace App\Http\Controllers;

use App\Models\Formulario008Evento;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class Formulario008EventoController extends Controller
{
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
            'evento.fecha' => 'required',
            'evento.lugar_evento' => 'required',
            'evento.direccion_evento' => 'required',
            'evento.custodia_policial' => 'required',
            'evento.observacion',
        ]);

        DB::beginTransaction();

        try {

            $evento = new Formulario008Evento();
            $evento->atencion_id = $request->atencion_id;
            $evento->atencion_formulario_id = $request->atencion_formulario_id;
            $evento->paciente_id = $request->paciente_id;
            $evento->area_salud_id = $request->area_salud_id;
            $evento->fecha = $request->evento["fecha"];
            $evento->lugar_evento = $request->evento["lugar_evento"];
            $evento->direccion_evento = $request->evento["direccion_evento"];
            $evento->custodia_policial = $request->evento["custodia_policial"];
            $evento->notificacion = $request->evento["notificacion"] ?? null;
            $evento->sugestivo_aliento_alcoholico = $request->evento["sugestivo_aliento_alcoholico"] ?? null;
            $evento->alcocheck = $request->evento["alcocheck"] ?? null;
            $evento->observacion = $request->evento["observacion"];
            $evento->user_id = Auth::user()->id;
            $evento->save();

            //accidente es un array de IDs numéricos ([2, 6]), no un array de objetos con campos como "id" => 2, etc.
            //foreach ($request->evento['accidente'] as $evento_tipo_id) {
            //    $evento->eventoTipos()->attach($evento_tipo_id);
            //}

            //Si quieres asegurarte de no duplicar relaciones en la tabla pivote, usa:

            //foreach ($request->evento['accidente'] as $evento_tipo_id) {
            //    $evento->eventoTipos()->syncWithoutDetaching([$evento_tipo_id]);
            //}
            //Esto agrega solo los que no estén ya relacionados.

            $evento->eventoTipos()->syncWithoutDetaching($request->evento['accidente']);
            $evento->eventoTipos()->syncWithoutDetaching($request->evento['violencia']);
            $evento->eventoTipos()->syncWithoutDetaching($request->evento['intoxicacion']);

            DB::commit();

            return response()->json(["mensaje" => "Evento registrada en la BD"], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(["mensaje" => "Ocurrió error al registrar el evento", "error" => $e->getMessage()], 400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        /*$formularioEvento = Formulario008Evento::where('atencion_formulario_id', $id)
            ->with('eventoTipos')
            ->first();*/

        // Agrupar los tipos por categoría
        /*$tiposAgrupados = $formularioEvento->eventoTipos->groupBy('evento_id')->map(function ($items) {
            return $items->pluck('id'); // Solo IDs si necesitas seleccionar checkboxes
        });*/

        $formularioEvento = Formulario008Evento::where('atencion_formulario_id', $id)
            ->with('eventoTipos.evento')
            ->first();

        if (!$formularioEvento || $formularioEvento->eventoTipos->isEmpty()) {
            return response()->json([
                'evento' => $formularioEvento,
                'tipos_evento_agrupados' => [
                    'accidente' => [],
                    'violencia' => [],
                    'intoxicación' => []
                ]
            ]);
        }

        $tiposAgrupados = $formularioEvento->eventoTipos
            ->filter(fn($item) => $item->evento)
            ->groupBy(fn($item) => strtolower($item->evento->nombre))
            ->map(fn($items) => $items->pluck('id')->values());

        return response()->json([
            'evento' => $formularioEvento,
            'tipos_evento_agrupados' => $tiposAgrupados
        ],200);

        //return response()->json($formularioEvento, 200);
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
            'evento.fecha' => 'required',
            'evento.lugar_evento' => 'required',
            'evento.direccion_evento' => 'required',
            'evento.custodia_policial' => 'required',
            'evento.observacion',
        ]);

        DB::beginTransaction();

        try {

            $evento = Formulario008Evento::findOrFail($id);
            $evento->atencion_id = $request->atencion_id;
            $evento->atencion_formulario_id = $request->atencion_formulario_id;
            $evento->paciente_id = $request->paciente_id;
            $evento->area_salud_id = $request->area_salud_id;
            $evento->fecha = $request->evento["fecha"];
            $evento->lugar_evento = $request->evento["lugar_evento"];
            $evento->direccion_evento = $request->evento["direccion_evento"];
            $evento->custodia_policial = $request->evento["custodia_policial"];
            $evento->notificacion = $request->evento["notificacion"] ?? null;
            $evento->sugestivo_aliento_alcoholico = $request->evento["sugestivo_aliento_alcoholico"] ?? null;
            $evento->alcocheck = $request->evento["alcocheck"] ?? null;
            $evento->observacion = $request->evento["observacion"];
            $evento->user_id = Auth::user()->id;
            $evento->save();

            // Reemplaza los tipos de evento relacionados
            //$evento->eventoTipos()->sync($request->evento['accidente']);
            //$evento->eventoTipos()->sync($request->evento['violencia']);
            //$evento->eventoTipos()->sync($request->evento['intoxicacion']);

            $ids = array_merge(
                $request->evento['accidente'] ?? [],
                $request->evento['violencia'] ?? [],
                $request->evento['intoxicacion'] ?? []
            );

            $evento->eventoTipos()->sync($ids);

            DB::commit();

            return response()->json(["mensaje" => "Evento registrada en la BD"], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(["mensaje" => "Ocurrió error al registrar el evento", "error" => $e->getMessage()], 400);
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
