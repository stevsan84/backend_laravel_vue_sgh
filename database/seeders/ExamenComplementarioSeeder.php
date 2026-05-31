<?php

namespace Database\Seeders;

use App\Models\ExamenComplementario;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExamenComplementarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $examenComplementario = new ExamenComplementario();
        $examenComplementario->nombre = 'Biometría';
        $examenComplementario->save();

        $examenComplementario = new ExamenComplementario();
        $examenComplementario->nombre = 'Uroanalisis';
        $examenComplementario->save();

        $examenComplementario = new ExamenComplementario();
        $examenComplementario->nombre = 'Química Sanguínea';
        $examenComplementario->save();

        $examenComplementario = new ExamenComplementario();
        $examenComplementario->nombre = 'Electrolitos';
        $examenComplementario->save();

        $examenComplementario = new ExamenComplementario();
        $examenComplementario->nombre = 'Gasometría';
        $examenComplementario->save();
        
        $examenComplementario = new ExamenComplementario();
        $examenComplementario->nombre = 'Electro Cardiograma';
        $examenComplementario->save();

        $examenComplementario = new ExamenComplementario();
        $examenComplementario->nombre = 'Endoscopia';
        $examenComplementario->save();

        $examenComplementario = new ExamenComplementario();
        $examenComplementario->nombre = 'Rx Tórax';
        $examenComplementario->save();

        $examenComplementario = new ExamenComplementario();
        $examenComplementario->nombre = 'Rx Abdomen';
        $examenComplementario->save();

        $examenComplementario = new ExamenComplementario();
        $examenComplementario->nombre = 'Rx Osea';
        $examenComplementario->save();

        $examenComplementario = new ExamenComplementario();
        $examenComplementario->nombre = 'Ecografìa Abdomen';
        $examenComplementario->save();

        $examenComplementario = new ExamenComplementario();
        $examenComplementario->nombre = 'Ecografìa Pèlvica';
        $examenComplementario->save();

        $examenComplementario = new ExamenComplementario();
        $examenComplementario->nombre = 'Tomografìa';
        $examenComplementario->save();

        $examenComplementario = new ExamenComplementario();
        $examenComplementario->nombre = 'Resonancia';
        $examenComplementario->save();

        $examenComplementario = new ExamenComplementario();
        $examenComplementario->nombre = 'Interconsulta';
        $examenComplementario->save();

        $examenComplementario = new ExamenComplementario();
        $examenComplementario->nombre = 'Otros';
        $examenComplementario->save();
    }
}
