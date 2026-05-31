<?php

namespace Database\Seeders;

use App\Models\FormacionProfesional;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FormacionProfesionalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $formacionProfesional = new FormacionProfesional();
        $formacionProfesional->nombre = 'Médico/a';
        $formacionProfesional->save();

        $formacionProfesional = new FormacionProfesional();
        $formacionProfesional->nombre = 'Odonólogo/a';
        $formacionProfesional->save();

        $formacionProfesional = new FormacionProfesional();
        $formacionProfesional->nombre = 'Psicólogo/a';
        $formacionProfesional->save();

        $formacionProfesional = new FormacionProfesional();
        $formacionProfesional->nombre = 'Obstetriz';
        $formacionProfesional->save();

        $formacionProfesional = new FormacionProfesional();
        $formacionProfesional->nombre = 'Nutricionista';
        $formacionProfesional->save();

        $formacionProfesional = new FormacionProfesional();
        $formacionProfesional->nombre = 'Enfermero/a';
        $formacionProfesional->save();

        $formacionProfesional = new FormacionProfesional();
        $formacionProfesional->nombre = 'Auxiliar de Enfermería';
        $formacionProfesional->save();

        /*$formacionProfesional = new FormacionProfesional();
        $formacionProfesional->nombre = 'Médico/a Rural';
        $formacionProfesional->save();

        $formacionProfesional = new FormacionProfesional();
        $formacionProfesional->nombre = 'Odontólogo/a Rural';
        $formacionProfesional->save();

        $formacionProfesional = new FormacionProfesional();
        $formacionProfesional->nombre = 'Obstetriz Rural';
        $formacionProfesional->save();

        $formacionProfesional = new FormacionProfesional();
        $formacionProfesional->nombre = 'Enfermero/a Rural';
        $formacionProfesional->save();*/

        $formacionProfesional = new FormacionProfesional();
        $formacionProfesional->nombre = 'Químico Farmaceutico/a';
        $formacionProfesional->save();

        $formacionProfesional = new FormacionProfesional();
        $formacionProfesional->nombre = 'Auxiliar de Farmacia';
        $formacionProfesional->save();

        $formacionProfesional = new FormacionProfesional();
        $formacionProfesional->nombre = 'Trabajadora Social';
        $formacionProfesional->save();

        $formacionProfesional = new FormacionProfesional();
        $formacionProfesional->nombre = 'Ingeniero/a';
        $formacionProfesional->save();

        $formacionProfesional = new FormacionProfesional();
        $formacionProfesional->nombre = 'Economista';
        $formacionProfesional->save();

        $formacionProfesional = new FormacionProfesional();
        $formacionProfesional->nombre = 'CPA';
        $formacionProfesional->save();

        $formacionProfesional = new FormacionProfesional();
        $formacionProfesional->nombre = 'Otros';
        $formacionProfesional->save();

    }
}
