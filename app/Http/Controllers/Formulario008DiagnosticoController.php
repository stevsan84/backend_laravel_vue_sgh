<?php

namespace App\Http\Controllers;

use App\Models\Formulario008Diagnostico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Formulario008DiagnosticoController extends Controller
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
            'diagnostico' => 'required|array|min:1',
            'diagnostico.*.id' => 'required|integer|exists:cie10s,id',
            'diagnostico.*.condicion' => 'required|string',
            'diagnostico.*.cronologia' => 'required|string',
        ]);

        DB::beginTransaction();

        try {

            $formularioDiagnostico = new Formulario008Diagnostico();
            $formularioDiagnostico->atencion_id = $request->atencion_id;
            $formularioDiagnostico->atencion_formulario_id = $request->atencion_formulario_id;
            $formularioDiagnostico->paciente_id = $request->paciente_id;
            $formularioDiagnostico->area_salud_id = $request->area_salud_id;

            $formularioDiagnostico->fecha = date("Y-m-d H:i:s");
            //$formularioDiagnostico->observacion = $request->diagnostico["observacion"];
            $formularioDiagnostico->user_id = Auth::user()->id;
            $formularioDiagnostico->save();

            $pivotData = collect($request->diagnostico)->mapWithKeys(fn($item) => [
                $item['id'] => [
                    'condicion' => $item['condicion'],
                    'cronologia' => $item['cronologia'],
                ],
            ])->toArray();

            $formularioDiagnostico->cie10s()->syncWithoutDetaching($pivotData);

            DB::commit();

            return response()->json(["mensaje" => "Diágnostico guardado"], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(["mensaje" => "Ocurrió error al registrar el diagnostico", "error" => $e->getMessage()], 400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $formularioDiagnostico = Formulario008Diagnostico::where('atencion_formulario_id', $id)
            ->with('cie10s')
            ->first();
        return response()->json($formularioDiagnostico, 200);
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
            'diagnostico' => 'required|array|min:1',
            'diagnostico.*.id' => 'required|integer|exists:cie10s,id',
            'diagnostico.*.condicion' => 'required|string',
            'diagnostico.*.cronologia' => 'required|string',
        ]);

        DB::beginTransaction();

        try {

            $formularioDiagnostico = Formulario008Diagnostico::findOrFail($id);
            $formularioDiagnostico->atencion_id = $request->atencion_id;
            $formularioDiagnostico->atencion_formulario_id = $request->atencion_formulario_id;
            $formularioDiagnostico->paciente_id = $request->paciente_id;
            $formularioDiagnostico->area_salud_id = $request->area_salud_id;

            //$formularioDiagnostico->fecha = date("Y-m-d H:i:s");
            //$formularioDiagnostico->observacion = $request->diagnostico["observacion"];
            $formularioDiagnostico->user_id = Auth::user()->id;
            $formularioDiagnostico->save();

            $pivotData = collect($request->diagnostico)->mapWithKeys(fn($item) => [
                $item['id'] => [
                    'condicion' => $item['condicion'],
                    'cronologia' => $item['cronologia'],
                ],
            ])->toArray();

            $formularioDiagnostico->cie10s()->sync($pivotData);
            //$examenComplementario->examenComplementarios()->sync($request->examenComplementario['examenComplementario']);
            DB::commit();

            return response()->json(["mensaje" => "Diágnostico actualizado en la BD"], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(["mensaje" => "Ocurrió error al actualizar el diagnostico", "error" => $e->getMessage()], 400);
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
