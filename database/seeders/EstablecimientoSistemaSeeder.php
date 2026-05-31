<?php

namespace Database\Seeders;

use App\Models\EstablecimientoSistema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EstablecimientoSistemaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $task = new EstablecimientoSistema();
        $task->nombre = 'Red Privada Complementaria';
        $task->save();
    }
}
