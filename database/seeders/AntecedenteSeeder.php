<?php

namespace Database\Seeders;

use App\Models\Antecedente;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AntecedenteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $antecedente = new Antecedente();
        $antecedente->nombre = 'Alérgicos';
        $antecedente->save();

        $antecedente = new Antecedente();
        $antecedente->nombre = 'Clínicos';
        $antecedente->save();

        $antecedente = new Antecedente();
        $antecedente->nombre = 'Ginecológicos';
        $antecedente->save();

        $antecedente = new Antecedente();
        $antecedente->nombre = 'Traumatológicos';
        $antecedente->save();

        $antecedente = new Antecedente();
        $antecedente->nombre = 'Pediátricos';
        $antecedente->save();

        $antecedente = new Antecedente();
        $antecedente->nombre = 'Quirúrgicos';
        $antecedente->save();

        $antecedente = new Antecedente();
        $antecedente->nombre = 'Farmacológicos';
        $antecedente->save();

        $antecedente = new Antecedente();
        $antecedente->nombre = 'Hábitos';
        $antecedente->save();

        $antecedente = new Antecedente();
        $antecedente->nombre = 'Familiares';
        $antecedente->save();

        $antecedente = new Antecedente();
        $antecedente->nombre = 'Otros';
        $antecedente->save();
    }
}
