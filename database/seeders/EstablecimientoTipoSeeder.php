<?php

namespace Database\Seeders;

use App\Models\EstablecimientoTipo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EstablecimientoTipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $task = new EstablecimientoTipo();
        $task->nombre = 'Primer Nivel';
        $task->nivel = '1';
        $task->descripcion = 'Centros Médico';
        $task->save();

        $task = new EstablecimientoTipo();
        $task->nombre = 'Segundo Nivel';
        $task->nivel = '2';
        $task->descripcion = 'Clínicas Generales';
        $task->save();

        $task = new EstablecimientoTipo();
        $task->nombre = 'Tercer Nivel';
        $task->nivel = '3';
        $task->descripcion = 'Clínicas Especializadas';
        $task->save();

    }
}
