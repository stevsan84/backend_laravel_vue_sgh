<?php

namespace Database\Seeders;

use App\Models\Especialidad;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EspecialidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $especialidad = new Especialidad();
        $especialidad->nombre = 'Gineco-Obstetricia';
        $especialidad->save();

        $especialidad = new Especialidad();
        $especialidad->nombre = 'Medicina Familiar';
        $especialidad->save();

        $especialidad = new Especialidad();
        $especialidad->nombre = 'Medicina Interna';
        $especialidad->save();

        $especialidad = new Especialidad();
        $especialidad->nombre = 'Pediatría';
        $especialidad->save();

        $especialidad = new Especialidad();
        $especialidad->nombre = 'Cirugía General';
        $especialidad->save();
    }
}
