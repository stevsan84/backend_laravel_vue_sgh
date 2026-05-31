<?php

namespace Database\Seeders;

use App\Models\Formulario;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FormularioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $formulario = new Formulario();
        $formulario->nombre = 'Form 008';
        $formulario->abreviatura = 'Formulario 008 Emergencia';
        $formulario->save();

        $formulario = new Formulario();
        $formulario->nombre = 'Form 002';
        $formulario->abreviatura = 'Formulario 002 Consulta Externa';
        $formulario->save();


    }
}
