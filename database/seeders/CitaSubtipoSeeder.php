<?php

namespace Database\Seeders;

use App\Models\CitaSubtipo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitaSubtipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $citaSubtipo = new CitaSubtipo();
        $citaSubtipo->nombre = 'Emergencia';
        $citaSubtipo->cita_tipo_id = 2;
        $citaSubtipo->save();

        $citaSubtipo = new CitaSubtipo();
        $citaSubtipo->nombre = 'Consulta Externa';
        $citaSubtipo->cita_tipo_id = 2;
        $citaSubtipo->save();

        $citaSubtipo = new CitaSubtipo();
        $citaSubtipo->nombre = 'Hospitalización';
        $citaSubtipo->cita_tipo_id = 2;
        $citaSubtipo->save();

        $citaSubtipo = new CitaSubtipo();
        $citaSubtipo->nombre = 'CENTRO SALUD PICHINCHA';
        $citaSubtipo->cita_tipo_id = 3;
        $citaSubtipo->save();

        $citaSubtipo = new CitaSubtipo();
        $citaSubtipo->nombre = 'CENTRO DE SALUD SAN SEBASTIAN';
        $citaSubtipo->cita_tipo_id = 3;
        $citaSubtipo->save();

        $citaSubtipo = new CitaSubtipo();
        $citaSubtipo->nombre = 'CENTRO DE SALUD SAN JUAN DEL DESVIO';
        $citaSubtipo->cita_tipo_id = 3;
        $citaSubtipo->save();

        $citaSubtipo = new CitaSubtipo();
        $citaSubtipo->nombre = 'CENTRO DE SALUD BARRAGANETE';
        $citaSubtipo->cita_tipo_id = 3;
        $citaSubtipo->save();

        $citaSubtipo = new CitaSubtipo();
        $citaSubtipo->nombre = 'Ambulatoria';
        $citaSubtipo->cita_tipo_id = 1;
        $citaSubtipo->save();

        $citaSubtipo = new CitaSubtipo();
        $citaSubtipo->nombre = 'Domicilio';
        $citaSubtipo->cita_tipo_id = 1;
        $citaSubtipo->save();

        $citaSubtipo = new CitaSubtipo();
        $citaSubtipo->nombre = 'Telemedicina';
        $citaSubtipo->cita_tipo_id = 1;
        $citaSubtipo->save();
    }
}
