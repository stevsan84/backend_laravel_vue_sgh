<?php

namespace Database\Seeders;

use App\Models\FarmaceuticaGeneral;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FarmaceuticaGeneralSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $general = new FarmaceuticaGeneral();
        $general->nombre = 'Sólida';
        $general->save();

        $general = new FarmaceuticaGeneral();
        $general->nombre = 'Semisólida';
        $general->save();

        $general = new FarmaceuticaGeneral();
        $general->nombre = 'Líquida';
        $general->save();

        $general = new FarmaceuticaGeneral();
        $general->nombre = 'Gaseosa';
        $general->save();

        $general = new FarmaceuticaGeneral();
        $general->nombre = 'Parenteral (Inyectable)';
        $general->save();

        $general = new FarmaceuticaGeneral();
        $general->nombre = 'Tópica';
        $general->save();

        $general = new FarmaceuticaGeneral();
        $general->nombre = 'Oftálmica';
        $general->save();

        $general = new FarmaceuticaGeneral();
        $general->nombre = 'Ótica';
        $general->save();

        $general = new FarmaceuticaGeneral();
        $general->nombre = 'Nasal';
        $general->save();

        $general = new FarmaceuticaGeneral();
        $general->nombre = 'Rectal';
        $general->save();

        $general = new FarmaceuticaGeneral();
        $general->nombre = 'Vaginal';
        $general->save();

        $general = new FarmaceuticaGeneral();
        $general->nombre = 'Inhalatoria';
        $general->save();

        $general = new FarmaceuticaGeneral();
        $general->nombre = 'Transdérmica';
        $general->save();

    }
}
