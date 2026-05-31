<?php

namespace Database\Seeders;

use App\Models\PresentacionUnidad;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PresentacionUnidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $unidad = new PresentacionUnidad();
        $unidad->nombre = 'tabletas';
        $unidad->save();

        $unidad = new PresentacionUnidad();
        $unidad->nombre = 'cápsulas';
        $unidad->save();

        $unidad = new PresentacionUnidad();
        $unidad->nombre = 'ml';
        $unidad->save();

        $unidad = new PresentacionUnidad();
        $unidad->nombre = 'mg';
        $unidad->save();
    }
}
