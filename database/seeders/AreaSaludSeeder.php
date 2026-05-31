<?php

namespace Database\Seeders;

use App\Models\AreaSalud;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AreaSaludSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $healthArea = new AreaSalud();
        $healthArea->nombre = 'Consulta Externa';
        $healthArea->save();

        $healthArea = new AreaSalud();
        $healthArea->nombre = 'Emergencia';
        $healthArea->save();

        $healthArea = new AreaSalud();
        $healthArea->nombre = 'Observación Emergencia';
        $healthArea->save();

        $healthArea = new AreaSalud();
        $healthArea->nombre = 'Hospitalización';
        $healthArea->save();

        $healthArea = new AreaSalud();
        $healthArea->nombre = 'Quirófano';
        $healthArea->save();

        $healthArea = new AreaSalud();
        $healthArea->nombre = 'Preparación';
        $healthArea->save();

    }
}
