<?php

namespace Database\Seeders;


use App\Models\Paciente;
use App\Models\User;
use App\Models\Zona;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Tests\Unit\ExampleTest;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        /*User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);*/

        $this->call([
           UserSeed::class,
            PermissionRoleSeeder::class,
            PaisSeeder::class,
            NacionalidadSeeder::class,
            ProvinciaSeeder::class,
            CantonSeeder::class,
            ParroquiaSeeder::class,
            EtnicoGrupoSeeder::class,
            IndigenaNacionalidadSeeder::class,
            IndigenaPuebloSeeder::class,
            SaludSeguroSeeder::class,
            FormacionProfesionalSeeder::class,
            EspecialidadSeeder::class,
            EstablecimientoSistemaSeeder::class,
            EstablecimientoTipoSeeder::class,
            //ZonaSeeder::class,
            //DistritoSeeder::class,
            EstablecimientoSeeder::class,
            //EstablecimientoUnidadSeeder::class,
            IdentificacionTipoSeeder::class,
            PortafolioServicioSeeder::class,
            AreaTrabajoSeeder::class,
            EducacionNivelSeeder::class,
            EducacionEstadoNivelSeeder::class,
            //BonoSolidarioSeeder::class,
            FamiliarParentescoSeeder::class,
            ManchesterTriageSeeder::class,
            AreaSaludSeeder::class,
            CitaTipoSeeder::class,
            CitaSubtipoSeeder::class,
            FormularioSeeder::class,
            EventoSeeder::class,
            EventoTipoSeeder::class,
            AntecedenteSeeder::class,
            ExamenFisicoSeeder::class,
            Cie10Seeder::class,
            CategoriaExamenSeeder::class,
            ExamenSeeder::class,
            ExamenComplementarioSeeder::class,
            AlmacenamientoTipoSeeder::class,
            BodegaTipoSeeder::class,
            BodegaGrupoSeeder::class,
            TipoUnidadSeeder::class,
            TipoTransaccionSeeder::class,
            FarmaceuticaGeneralSeeder::class,
            FarmaceuticaEspecificaSeeder::class,
            EmpaquePresentacionSeeder::class,
            PresentacionUnidadSeeder::class,
       ]);
       //Paciente::factory(10)->create();
    }
}
