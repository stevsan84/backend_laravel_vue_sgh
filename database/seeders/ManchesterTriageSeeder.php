<?php

namespace Database\Seeders;

use App\Models\ManchesterTriage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ManchesterTriageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $manchesterTriage = new ManchesterTriage();
        $manchesterTriage->nivel = 1;
        $manchesterTriage->nombre = 'EMERGENCIA';
        $manchesterTriage->color = 'ROJO';
        $manchesterTriage->categoria = 'INMEDIATO';
        $manchesterTriage->tiempo_espera = 0;
        $manchesterTriage->comentario = 'INMEDIATA';
        $manchesterTriage->save();

        $manchesterTriage = new ManchesterTriage();
        $manchesterTriage->nivel = 2;
        $manchesterTriage->nombre = 'MUY URGENTE';
        $manchesterTriage->color = 'NARANJA';
        $manchesterTriage->categoria = 'EMERGENCIA';
        $manchesterTriage->tiempo_espera = 10;
        $manchesterTriage->comentario = '10 MIN';
        $manchesterTriage->save();

        $manchesterTriage = new ManchesterTriage();
        $manchesterTriage->nivel = 3;
        $manchesterTriage->nombre = 'URGENTE';
        $manchesterTriage->color = 'AMARILLO';
        $manchesterTriage->categoria = 'URGENCIA';
        $manchesterTriage->tiempo_espera = 60;
        $manchesterTriage->comentario = '60 MIN';
        $manchesterTriage->save();

        $manchesterTriage = new ManchesterTriage();
        $manchesterTriage->nivel = 4;
        $manchesterTriage->nombre = 'MENOS URGENTE';
        $manchesterTriage->color = 'VERDE';
        $manchesterTriage->categoria = 'MENOS URGENTE';
        $manchesterTriage->tiempo_espera = 120;
        $manchesterTriage->comentario = '120 MIN';
        $manchesterTriage->save();

        $manchesterTriage = new ManchesterTriage();
        $manchesterTriage->nivel = 5;
        $manchesterTriage->nombre = 'NO URGENTE';
        $manchesterTriage->color = 'AZUL';
        $manchesterTriage->categoria = 'NO URGENTE';
        $manchesterTriage->tiempo_espera = 240;
        $manchesterTriage->comentario = '240 MIN';
        $manchesterTriage->save();

    }
}
