<?php

namespace Database\Seeders;

use App\Models\Establecimiento;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EstablecimientoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $task = new Establecimiento();
        $task->identificacion_code = '123456';
        $task->codigo_unico = '123456';
        $task->razon_social = 'CLINICA ROMULO BELLO';
        $task->representante_legal = 'ROMULO BELLO';
        $task->establecimiento_sistema_id = '1';
        $task->establecimiento_tipos_id = '1';
        $task->pais_id = '1';
        $task->provincia_id = '1';
        $task->canton_id = '1';
        $task->parroquia_id = '1';
        $task->direccion = 'VIA MANTA QUEVEDO';
        $task->save();
    }
}
