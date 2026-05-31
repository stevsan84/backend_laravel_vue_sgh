<?php

namespace Database\Seeders;

use App\Models\EducacionEstadoNivel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EducacionEstadoNivelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $educacionEstadoNivel = new EducacionEstadoNivel();
        $educacionEstadoNivel->nombre = 'Cursando';
        $educacionEstadoNivel->save();

        $educacionEstadoNivel = new EducacionEstadoNivel();
        $educacionEstadoNivel->nombre = 'Completa';
        $educacionEstadoNivel->save();

        $educacionEstadoNivel = new EducacionEstadoNivel();
        $educacionEstadoNivel->nombre = 'Incompleta';
        $educacionEstadoNivel->save();

        $educacionEstadoNivel = new EducacionEstadoNivel();
        $educacionEstadoNivel->nombre = 'Ninguna';
        $educacionEstadoNivel->save();
    }
}
