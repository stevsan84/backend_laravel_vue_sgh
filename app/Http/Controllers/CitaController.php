<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CitaController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        //$q = $request->q;

        $limit = isset($request->limit) ? $request->limit : 5;
        if (isset($request->q)) {
            if (isset($request->fechaDesde) && isset($request->fechaHasta)) {
                /*$citas = Cita::with(['paciente', 'persona', 'portafolioServicio'])
                ->where(function ($query) use ($request) {
                    $searchTerms = explode(' ', $request->q);

                    // Buscar en paciente
                    $query->whereHas('paciente', function ($q) use ($searchTerms) {
                        foreach ($searchTerms as $term) {
                            $q->where(function ($subQ) use ($term) {
                                $subQ->where('nombre_primero', 'LIKE', "%$term%")
                                    ->orWhere('nombre_segundo', 'LIKE', "%$term%")
                                    ->orWhere('apellido_primero', 'LIKE', "%$term%")
                                    ->orWhere('apellido_segundo', 'LIKE', "%$term%")
                                    ->orWhere('identificacion_code', 'LIKE', "%$term%");
                            });
                        }
                    });

                    // O buscar en persona
                    $query->orWhereHas('persona', function ($q) use ($searchTerms) {
                        foreach ($searchTerms as $term) {
                            $q->where(function ($subQ) use ($term) {
                                $subQ->where('nombre_primero', 'LIKE', "%$term%")
                                    ->orWhere('nombre_segundo', 'LIKE', "%$term%")
                                    ->orWhere('apellido_primero', 'LIKE', "%$term%")
                                    ->orWhere('apellido_segundo', 'LIKE', "%$term%")
                                    ->orWhere('identificacion_code', 'LIKE', "%$term%");
                            });
                        }
                    });

                    // O buscar en portafolioServicio por nombre
                    $query->orWhereHas('portafolioServicio', function ($q) use ($searchTerms) {
                        foreach ($searchTerms as $term) {
                            $q->where('nombre', 'LIKE', "%$term%");
                        }
                    });
                })
                ->whereDate('fecha_inicio', '>=', $request->fechaDesde)
                ->whereDate('fecha_inicio', '<=', $request->fechaHasta)
                ->orderBy('id', 'desc')
                ->paginate($limit);*/ // solo busquedad en mayuscula o si es minuscula

                //codigo para todo

                $citas = Cita::with(['paciente', 'persona', 'portafolioServicio'])
                    ->where(function ($query) use ($request) {
                        $searchTerms = explode(' ', $request->q);

                        // En paciente
                        $query->whereHas('paciente', function ($q) use ($searchTerms) {
                            foreach ($searchTerms as $term) {
                                $q->where(function ($subQ) use ($term) {
                                    $subQ->whereRaw("unaccent(nombre_primero) ILIKE unaccent(?)", ["%$term%"])
                                        ->orWhereRaw("unaccent(nombre_segundo) ILIKE unaccent(?)", ["%$term%"])
                                        ->orWhereRaw("unaccent(apellido_primero) ILIKE unaccent(?)", ["%$term%"])
                                        ->orWhereRaw("unaccent(apellido_segundo) ILIKE unaccent(?)", ["%$term%"])
                                        ->orWhereRaw("unaccent(identificacion_code) ILIKE unaccent(?)", ["%$term%"]);
                                });
                            }
                        });

                        // En persona
                        $query->orWhereHas('persona', function ($q) use ($searchTerms) {
                            foreach ($searchTerms as $term) {
                                $q->where(function ($subQ) use ($term) {
                                    $subQ->whereRaw("unaccent(nombre_primero) ILIKE unaccent(?)", ["%$term%"])
                                        ->orWhereRaw("unaccent(nombre_segundo) ILIKE unaccent(?)", ["%$term%"])
                                        ->orWhereRaw("unaccent(apellido_primero) ILIKE unaccent(?)", ["%$term%"])
                                        ->orWhereRaw("unaccent(apellido_segundo) ILIKE unaccent(?)", ["%$term%"])
                                        ->orWhereRaw("unaccent(identificacion_code) ILIKE unaccent(?)", ["%$term%"]);
                                });
                            }
                        });

                        // En portafolioServicio
                        $query->orWhereHas('portafolioServicio', function ($q) use ($searchTerms) {
                            foreach ($searchTerms as $term) {
                                $q->whereRaw("unaccent(nombre) ILIKE unaccent(?)", ["%$term%"]);
                            }
                        });

                        // En el campo estado de la propia tabla cita
                        foreach ($searchTerms as $term) {
                            $query->orWhereRaw("unaccent(estado::text) ILIKE unaccent(?)", ["%$term%"]);
                        }
                    })
                    ->whereDate('fecha', '>=', $request->fechaDesde)
                    ->whereDate('fecha', '<=', $request->fechaHasta)
                    ->orderBy('id', 'desc')
                    ->paginate($limit);
            } else {
                $citas = null;
            }
        } else {
            if (isset($request->fechaDesde) && isset($request->fechaHasta)) {
                $citas = Cita::with(['paciente', 'persona', 'portafolioServicio'])
                    ->whereDate('fecha', '>=', $request->fechaDesde)
                    ->whereDate('fecha', '<=', $request->fechaHasta)
                    ->orderBy('id', 'desc')
                    ->paginate($limit);
            } else {
                $citas = null;
            }
        }

        return response()->json($citas, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            "portafolio_servicio_id" => "required",
            "persona_id" => "required",
            "paciente_id" => "required",
            'fecha' => 'required',
            //'hora' => 'required',
            'cita_tipo_id' => 'required',
            'cita_subtipo_id' => 'required',
        ]);


        DB::beginTransaction();

        try {

            //$fecha_inicio = Carbon::parse($request->fecha_inicio . ' ' . $request->hora_inicio);
            //$fecha_final = Carbon::parse($fecha_inicio);
            //$fecha_final->addMinutes(30);

            /*$admision = new Admision();
            $admision->paciente_id = $request->paciente_id;
            $admision->area_salud_id = 1;
            $admision->fecha = Carbon::now();
            $admision->estado = 'en_espera';
            $admision->cita_tipo_id = $request->cita_tipo_id;
            $admision->cita_subtipo_id  = $request->cita_subtipo_id;
            $admision->area_salud_actual_id  = 1;
            $admision->save();*/

            $cita = new Cita();
            $cita->portafolio_servicio_id = $request->portafolio_servicio_id;
            $cita->persona_id = $request->persona_id;
            $cita->paciente_id =  $request->paciente_id;
            $cita->fecha = $request->fecha;
            $cita->hora = $request->hora;
            $cita->turno_extra = $request->turno_extra;
            $cita->comentario = $request->comentario;
            $cita->cita_tipo_id = $request->cita_tipo_id;
            $cita->cita_subtipo_id  = $request->cita_subtipo_id;
            $cita->atencion_tipo  = $request->atencion_tipo;
            //$cita->admision_id = $admision->id;
            $cita->user_id = Auth::user()->id;
            $cita->save();

            DB::commit();

            return response()->json(["mensaje" => "Cita registrada"], 201);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(["mensaje" => "Ocurrió error al registrar la cita", "error" => $e->getMessage()], 400);
        }
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $cita = Cita::find($id);
        $cita->estado = 'cancelada';
        $cita->user_id = Auth::user()->id;
        $cita->save();

        return response()->json(["mensaje" => "Cia cancelada en la BD"], 200);
    }

    public function getHorarios(Request $request)
    {

        $fecha = $request->query('fecha');
        $persona_id = $request->query('persona_id');
        // Configura las fechas de inicio y fin por defecto
        //$this->fecha_inicio = Carbon::now()->startOfDay(); // Puedes poner el valor que desees
        //$this->fecha_fin = Carbon::now()->endOfDay();    // Lo mismo con la fecha fin

        // Configura las horas de inicio y fin por defecto
        $hora_inicio = Carbon::now()->setTime(9, 30);  // Ejemplo: 8:00 AM
        $hora_fin = Carbon::now()->setTime(12, 30);     // Ejemplo: 4:00 PM

        // Limpiar el array de intervalos
        $intervalos = [];

        $start = Carbon::parse($hora_inicio);
        $end = Carbon::parse($hora_fin);
        $id_counter = 1;

        // Generar los intervalos de 30 minutos
        while ($start <= $end) {
            $intervalos[] = [
                'id' => $id_counter,
                'hora' => $start->format('H:i'),
            ];
            $start->addMinutes(30); // Añadir 30 minutos al intervalo
            $id_counter++;
        }


        $shedulesM = $intervalos;

        // Configura las horas de inicio y fin por defecto
        $hora_inicio = Carbon::now()->setTime(13, 30);  // Ejempo: 8:00 AM
        $hora_fin = Carbon::now()->setTime(16, 00);     // Ejemplo: 4:00 PM

        // Limpiar el array de intervalos
        $intervalos = [];

        $start = Carbon::parse($hora_inicio);
        $end = Carbon::parse($hora_fin);
        //$id_counter = 1;

        // Generar los intervalos de 30 minutos
        while ($start <= $end) {
            $intervalos[] = [
                'id' => $id_counter,
                'hora' => $start->format('H:i'),
            ];
            $start->addMinutes(30); // Añadir 30 minutos al intervalo
            $id_counter++;
        }

        $shedulesA = $intervalos;

        $matriz = Cita::where('persona_id', $persona_id)
            ->where('estado', '<>', 'cancelada')
            ->whereDate('fecha', $fecha)
            ->selectRaw('id, to_char(hora, \'HH24:MI\') as hora')
            ->get();

        // Limpiar las matrices
        $matriz_manana = [];
        $matriz_tarde = [];

        foreach ($matriz as $item) {
            $datetime = Carbon::parse($item['hora']);

            // Dividir entre mañana y tarde
            if ($datetime->hour <= 12) {
                $matriz_manana[] = $item;  // Mañana: de 00:00 a 11:59
            } else {
                $matriz_tarde[] = $item;  // Tarde: de 12:00 a 23:59
            }
        }

        // Extraemos solo las horas de ambas matrices
        $horas1_only = array_column($matriz_manana, 'hora');
        $horas2_only = array_column($shedulesM, 'hora');

        // Filtramos las horas que no se repiten
        $horas_unicas1 = array_diff($horas1_only, $horas2_only);
        $horas_unicas2 = array_diff($horas2_only, $horas1_only);

        // Ahora recuperamos las filas completas basándonos en las horas únicas
        $available_schedulesM = array_merge(
            array_filter($matriz_manana, fn($item) => in_array($item['hora'], $horas_unicas1)),
            array_filter($shedulesM, fn($item) => in_array($item['hora'], $horas_unicas2))
        );

        // Extraemos solo las horas de ambas matrices
        $horas1_only = array_column($matriz_tarde, 'hora');
        $horas2_only = array_column($shedulesA, 'hora');

        // Filtramos las horas que no se repiten
        $horas_unicas1 = array_diff($horas1_only, $horas2_only);
        $horas_unicas2 = array_diff($horas2_only, $horas1_only);

        // Ahora recuperamos las filas completas basándonos en las horas únicas
        $available_schedulesA = array_merge(
            array_filter($matriz_tarde, fn($item) => in_array($item['hora'], $horas_unicas1)),
            array_filter($shedulesA, fn($item) => in_array($item['hora'], $horas_unicas2))
        );


        return response()->json(compact('available_schedulesM', 'available_schedulesA'), 200);
    }
}
