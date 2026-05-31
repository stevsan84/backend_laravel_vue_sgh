<?php

namespace Database\Seeders;

use App\Models\EducacionNivel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EducacionNivelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $educacionNivel = new EducacionNivel();
        $educacionNivel->nombre = 'Edu. Básico Jovénes y Adultos';
        $educacionNivel->save();

        $educacionNivel = new EducacionNivel();
        $educacionNivel->nombre = 'Inicial';
        $educacionNivel->save();

        $educacionNivel = new EducacionNivel();
        $educacionNivel->nombre = 'Edu. Básica (Preparatoria)';
        $educacionNivel->save();

        $educacionNivel = new EducacionNivel();
        $educacionNivel->nombre = 'Edu. Básica (Elem y Media)';
        $educacionNivel->save();

        $educacionNivel = new EducacionNivel();
        $educacionNivel->nombre = 'Edu. Básica (Superior)';
        $educacionNivel->save();

        $educacionNivel = new EducacionNivel();
        $educacionNivel->nombre = 'Superior Técnico Superior';
        $educacionNivel->save();

        $educacionNivel = new EducacionNivel();
        $educacionNivel->nombre = 'Superior 3er Nivel de Grado';
        $educacionNivel->save();

        $educacionNivel = new EducacionNivel();
        $educacionNivel->nombre = 'Superior 4to Nivel Postgrado';
        $educacionNivel->save();

        $educacionNivel = new EducacionNivel();
        $educacionNivel->nombre = 'Ninguno';
        $educacionNivel->save();

        $educacionNivel = new EducacionNivel();
        $educacionNivel->nombre = 'Se Ignora';
        $educacionNivel->save();
    }
}
