<?php

namespace Database\Seeders;

use App\Models\AreaTrabajo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AreaTrabajoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $areaTrabajo = new AreaTrabajo();
        $areaTrabajo->nombre = 'Médico';
        $areaTrabajo->save();

        $areaTrabajo = new AreaTrabajo();
        $areaTrabajo->nombre = 'Enfermería';
        $areaTrabajo->save();

        $areaTrabajo = new AreaTrabajo();
        $areaTrabajo->nombre = 'Laboratorio';
        $areaTrabajo->save();

        $areaTrabajo = new AreaTrabajo();
        $areaTrabajo->nombre = 'Farmacia';
        $areaTrabajo->save();

        $areaTrabajo = new AreaTrabajo();
        $areaTrabajo->nombre = 'Estadistica';
        $areaTrabajo->save();

        $areaTrabajo = new AreaTrabajo();
        $areaTrabajo->nombre = 'Administrativo';
        $areaTrabajo->save();
    }
}
