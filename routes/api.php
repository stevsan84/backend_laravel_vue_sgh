<?php

use App\Http\Controllers\AdmisionPacienteController;
use App\Http\Controllers\AlmacenamientoTipoController;
use App\Http\Controllers\AntecedenteController;
use App\Http\Controllers\AntropometricaMedidaController;
use App\Http\Controllers\AreaTrabajoController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BodegaController;
use App\Http\Controllers\BodegaGrupoController;
use App\Http\Controllers\BodegaTipoController;
use App\Http\Controllers\BonoSolidarioController;
use App\Http\Controllers\CantonController;
use App\Http\Controllers\CapilarMedicionController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\Cie10Controller;
use App\Http\Controllers\CitaController;
use App\Http\Controllers\CitaSubtipoController;
use App\Http\Controllers\CitaTipoController;
use App\Http\Controllers\EducacionEstadoNivelController;
use App\Http\Controllers\EducacionNivelController;
use App\Http\Controllers\EmpaquePresentacionController;
use App\Http\Controllers\EspecialidadController;
use App\Http\Controllers\EstablecimientoUnidadController;
use App\Http\Controllers\EtnicoGrupoController;
use App\Http\Controllers\EventoTipoController;
use App\Http\Controllers\EvolucionController;
use App\Http\Controllers\ExamenComplementarioController;
use App\Http\Controllers\ExamenFisicoController;
use App\Http\Controllers\FamiliarParentescoController;
use App\Http\Controllers\FarmaceuticaEspecificaController;
use App\Http\Controllers\FarmaceuticaGeneralController;
use App\Http\Controllers\FormacionProfesionalController;
use App\Http\Controllers\Formulario008AntecedenteController;
use App\Http\Controllers\Formulario008DiagnosticoController;
use App\Http\Controllers\Formulario008EmbarazoController;
use App\Http\Controllers\Formulario008EventoController;
use App\Http\Controllers\Formulario008ExamenComplementarioController;
use App\Http\Controllers\Formulario008ExamenFisicoController;
use App\Http\Controllers\Formulario008ExamenFisicoTraumaController;
use App\Http\Controllers\Formulario008InicioAtencionController;
use App\Http\Controllers\IdentificacionTipoController;
use App\Http\Controllers\IndigenaNacionalidadController;
use App\Http\Controllers\IndigenaPuebloController;
use App\Http\Controllers\LaboratorioFabricanteController;
use App\Http\Controllers\LoteController;
use App\Http\Controllers\ManchesterTriageController;
use App\Http\Controllers\NacionalidadController;
use App\Http\Controllers\NeurologicaValoracionController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\PaisController;
use App\Http\Controllers\ParroquiaController;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\PortafolioServicioController;
use App\Http\Controllers\PreparacionController;
use App\Http\Controllers\PresentacionUnidadController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProvinciaController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SaludSeguroController;
use App\Http\Controllers\SignosVitaleController;
use App\Http\Controllers\TipoTransaccionController;
use App\Http\Controllers\TipoUnidadController;
use App\Http\Controllers\TransaccionController;
use App\Http\Controllers\UnidadController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
     /*return [
        'user' => $request->user(),
        'roles' => $request->user()->getRoleNames(),
        'permissions' => $request->user()->getAllPermissions()->pluck('name'),
    ];*/
})->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->group(function () {

    Route::get("/form008/{id}/pdf",[Formulario008InicioAtencionController::class,"funReportePDF"]);

    Route::get('/canton/{provincia_id}', [CantonController::class, "getCantones"]);
    Route::get('/parroquia/{canton_id}', [ParroquiaController::class, "getParroquias"]);

    //asignara cuenta user a persona
    Route::post("/persona/{id}/adduser", [PersonaController::class,"funAddUserPersona"]);

    //seleccionar personal por el portafolio
    Route::get("/persona/{portafolio_id}", [PersonaController::class,"getPersonaPortafolio"]);

    Route::get("/cita-subtipo/{citaTipo_id}", [CitaSubtipoController::class, "getCitaSubtipo"]);

    Route::get("/cita/horario", [CitaController::class, "getHorarios"]);

    Route::post("/preparacion/emergencia", [PreparacionController::class, "storeEmergencia"]);

    Route::get("/preparacion/emergencia/paciente", [PreparacionController::class, "getAgendaEmergencia"]);

    Route::get("/evento-tipo/{id}", [EventoTipoController::class, "getEventoTipo"]);

    //Route::post("/formulario008/evento", [Formulario008Controller::class,"storeEvento"]);

    Route::get("/signos-vitale/medico/{id}", [SignosVitaleController::class, "getSignosVitaleMedico"]);

    Route::get("/antropometrica-medida/medico/{id}", [AntropometricaMedidaController::class, "getAntropometricaMedidaMedico"]);

    Route::get("/capilar-medicion/medico/{id}", [CapilarMedicionController::class, "getCapilarMedicionMedico"]);

    Route::get("/transaccion-buscar", [TransaccionController::class, "funBuscar"]);

    Route::post("/bodega-asociacion", [BodegaController::class, "storeAsociacionUser"]);

    Route::get("/transacciones-permitidas", [BodegaController::class, "transaccionesPermitidas"]);

    Route::get('/bodega/{id}/usuarios-transacciones', [BodegaController::class, 'usuariosTransacciones']);

    Route::get('/farmaceutica-especifica/{farmaceuticaG_id}', [FarmaceuticaEspecificaController::class, "getFarmaceuticasE"]);

    //CRUS API REST USER
    Route::get("/user", [UserController::class, "funListar"]);
    Route::post("/user", [UserController::class, "funGuardar"]);
    Route::get("/user/{id}", [UserController::class, "funMostrar"]);
    Route::put("/user/{id}", [UserController::class, "funModificar"]);
    Route::delete("/user/{id}", [UserController::class, "funEliminar"]);
    Route::get("/user-buscar", [UserController::class, "funBuscar"]);

     //CRUD Roles
    Route::apiResource("role", RoleController::class);
    Route::apiResource("persona", PersonaController::class);
    Route::apiResource("identicacion-tipo", IdentificacionTipoController::class);
    Route::apiResource("pais", PaisController::class);
    Route::apiResource("nacionalidad", NacionalidadController::class);
    Route::apiResource("provincia", ProvinciaController::class);
    Route::apiResource("canton", CantonController::class);
    Route::apiResource("parroquia", ParroquiaController::class);
    Route::apiResource("etnico-grupo", EtnicoGrupoController::class);
    //Route::apiResource("unidades", EstablecimientoUnidadController::class);
    Route::apiResource("portafolio", PortafolioServicioController::class);
    Route::apiResource("formacion", FormacionProfesionalController::class);
    Route::apiResource("especialidad", EspecialidadController::class);
    Route::apiResource("area", AreaTrabajoController::class);
    Route::apiResource("paciente", PacienteController::class);
    Route::apiResource("seguro", SaludSeguroController::class);
    Route::apiResource("indigena-pueblo", IndigenaPuebloController::class);
    Route::apiResource("indigena-nacionalidad", IndigenaNacionalidadController::class);
    Route::apiResource("educacion-nivel", EducacionNivelController::class);
    Route::apiResource("educacion-nivel-estado", EducacionEstadoNivelController::class);
    //Route::apiResource("bono", BonoSolidarioController::class);
    Route::apiResource("parentesco", FamiliarParentescoController::class);
    Route::apiResource("cita", CitaController::class);
    Route::apiResource("cita-tipo", CitaTipoController::class);
    Route::apiResource("cita-subtipo", CitaSubtipoController::class);
    Route::apiResource("manchester-triage", ManchesterTriageController::class);
    Route::apiResource("preparacion", PreparacionController::class);
    Route::apiResource("antecedente", AntecedenteController::class);
    Route::apiResource("signos-vitale", SignosVitaleController::class);
    Route::apiResource("antropometrica-medida", AntropometricaMedidaController::class);
    Route::apiResource("capilar-medicion", CapilarMedicionController::class);
    Route::apiResource("neurologica-valoracion", NeurologicaValoracionController::class);
    Route::apiResource("examen-fisico", ExamenFisicoController::class);
    Route::apiResource("admision-paciente", AdmisionPacienteController::class);
    Route::apiResource("formulario008-inicio-atencion", Formulario008InicioAtencionController::class);
    Route::apiResource("formulario008-evento", Formulario008EventoController::class);
    Route::apiResource("formulario008-antecedente", Formulario008AntecedenteController::class);
    Route::apiResource("evolucion", EvolucionController::class);
    Route::apiResource("formulario008-examen", Formulario008ExamenFisicoController::class);
    Route::apiResource("formulario008-examen-trauma", Formulario008ExamenFisicoTraumaController::class);
    Route::apiResource("formulario008-embarazo", Formulario008EmbarazoController::class);
    Route::apiResource("examen-complementario", ExamenComplementarioController::class);
    Route::apiResource("formulario008-examen-comp", Formulario008ExamenComplementarioController::class);
    Route::apiResource("cie", Cie10Controller::class);
    Route::apiResource("formulario008-diagnostico", Formulario008DiagnosticoController::class);
    Route::apiResource("bodega", BodegaController::class);
    Route::apiResource("almacenamiento-tipo", AlmacenamientoTipoController::class);
    Route::apiResource("bodega-tipo", BodegaTipoController::class);
    Route::apiResource("tipo-unidad", TipoUnidadController::class);
    Route::apiResource("unidad", UnidadController::class);
    Route::apiResource("categoria", CategoriaController::class);
    Route::apiResource("producto", ProductoController::class);
    Route::apiResource("fabricante", LaboratorioFabricanteController::class);
    Route::apiResource("lote", LoteController::class);
    Route::apiResource("tipo-transaccion", TipoTransaccionController::class);
    Route::apiResource("transaccion", TransaccionController::class);
    Route::apiResource("grupo-bodega", BodegaGrupoController::class);
    Route::apiResource("farmaceutica-general", FarmaceuticaGeneralController::class);
    Route::apiResource("farmaceutica-especifica", FarmaceuticaEspecificaController::class);
    Route::apiResource("presentacion-empaque", EmpaquePresentacionController::class);
    Route::apiResource("presentacion-unidad", PresentacionUnidadController::class);
});



//Auth
Route::prefix('/v1/auth')->group(function () {
    Route::post("/login", [AuthController::class, "funLogin"]);
    Route::post("/register", [AuthController::class, "funRegister"]);

    Route::middleware('auth:sanctum')->group(function () {
        Route::get("/profile", [AuthController::class, "funProfile"]);
        Route::post("/logout", [AuthController::class, "funLogout"]);
    });
});


//redireccion (NO AUTENTICADO)
Route::get("/no-autentiacado", function(){
    return["mensaje" => "SIN PERMISO"];
})->name("login");
