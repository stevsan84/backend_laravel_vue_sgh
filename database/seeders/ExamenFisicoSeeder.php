<?php

namespace Database\Seeders;

use App\Models\ExamenFisico;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExamenFisicoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $examenFisico = new ExamenFisico();
        $examenFisico->nombre = 'Piel - Faneras';
        $examenFisico->save();

        $examenFisico = new ExamenFisico();
        $examenFisico->nombre = 'Cabeza';
        $examenFisico->save();

        $examenFisico = new ExamenFisico();
        $examenFisico->nombre = 'Ojos';
        $examenFisico->save();

        $examenFisico = new ExamenFisico();
        $examenFisico->nombre = 'Oídos';
        $examenFisico->save();

        $examenFisico = new ExamenFisico();
        $examenFisico->nombre = 'Nariz';
        $examenFisico->save();

        $examenFisico = new ExamenFisico();
        $examenFisico->nombre = 'Boca';
        $examenFisico->save();

        $examenFisico = new ExamenFisico();
        $examenFisico->nombre = 'Oro faringe';
        $examenFisico->save();

        $examenFisico = new ExamenFisico();
        $examenFisico->nombre = 'Cuello';
        $examenFisico->save();

        $examenFisico = new ExamenFisico();
        $examenFisico->nombre = 'Axilas - Mamas';
        $examenFisico->save();

        $examenFisico = new ExamenFisico();
        $examenFisico->nombre = 'Tórax';
        $examenFisico->save();

        $examenFisico = new ExamenFisico();
        $examenFisico->nombre = 'Abdomen';
        $examenFisico->save();

        $examenFisico = new ExamenFisico();
        $examenFisico->nombre = 'Columna vertebral';
        $examenFisico->save();

        $examenFisico = new ExamenFisico();
        $examenFisico->nombre = 'Ingle - Periné';
        $examenFisico->save();

        $examenFisico = new ExamenFisico();
        $examenFisico->nombre = 'Miembros superiores';
        $examenFisico->save();

        $examenFisico = new ExamenFisico();
        $examenFisico->nombre = 'Miembros inferiores';
        $examenFisico->save();
    }
}
