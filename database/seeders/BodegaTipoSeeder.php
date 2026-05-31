<?php

namespace Database\Seeders;

use App\Models\BodegaTipo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BodegaTipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $bodegaTipo = new BodegaTipo();
        $bodegaTipo->nombre = 'Física';
        $bodegaTipo->save();

        $bodegaTipo = new BodegaTipo();
        $bodegaTipo->nombre = 'Virtual';
        $bodegaTipo->save();
    }
}
