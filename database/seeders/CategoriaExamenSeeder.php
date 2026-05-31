<?php

namespace Database\Seeders;

use App\Models\CategoriaExamen;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriaExamenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $categoriaExamen = new CategoriaExamen();
        $categoriaExamen->nombre = 'Química Sanguínea';
        $categoriaExamen->save();

        $categoriaExamen = new CategoriaExamen();
        $categoriaExamen->nombre = 'Hematología';
        $categoriaExamen->save();

        $categoriaExamen = new CategoriaExamen();
        $categoriaExamen->nombre = 'Hormonales';
        $categoriaExamen->save();

        $categoriaExamen = new CategoriaExamen();
        $categoriaExamen->nombre = 'Serología';
        $categoriaExamen->save();

        $categoriaExamen = new CategoriaExamen();
        $categoriaExamen->nombre = 'Heces';
        $categoriaExamen->save();

        $categoriaExamen = new CategoriaExamen();
        $categoriaExamen->nombre = 'Orina';
        $categoriaExamen->save();

        $categoriaExamen = new CategoriaExamen();
        $categoriaExamen->nombre = 'Coagulación y Hemostasia';
        $categoriaExamen->save();

        $categoriaExamen = new CategoriaExamen();
        $categoriaExamen->nombre = 'Inmunología / Infecciosas';
        $categoriaExamen->save();

        $categoriaExamen = new CategoriaExamen();
        $categoriaExamen->nombre = 'Marcadores Tumorales';
        $categoriaExamen->save();

        $categoriaExamen = new CategoriaExamen();
        $categoriaExamen->nombre = 'Citoquímico y Bacteriológico de Líquidos';
        $categoriaExamen->save();

        $categoriaExamen = new CategoriaExamen();
        $categoriaExamen->nombre = 'Marcadores Cardiacos / Vasculares';
        $categoriaExamen->save();

        $categoriaExamen = new CategoriaExamen();
        $categoriaExamen->nombre = 'Inmunosupresores';
        $categoriaExamen->save();

        $categoriaExamen = new CategoriaExamen();
        $categoriaExamen->nombre = 'Gases y Electrolitos';
        $categoriaExamen->save();

        $categoriaExamen = new CategoriaExamen();
        $categoriaExamen->nombre = 'Medicina Transfusional';
        $categoriaExamen->save();

        $categoriaExamen = new CategoriaExamen();
        $categoriaExamen->nombre = 'Niveles de Fármacos Terapéuticas';
        $categoriaExamen->save();

        $categoriaExamen = new CategoriaExamen();
        $categoriaExamen->nombre = 'Microbiología';
        $categoriaExamen->save();
    }
}
