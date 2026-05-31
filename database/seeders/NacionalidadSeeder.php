<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NacionalidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('nacionalidads')->insert([
            ['nombre' => 'Ecuatoriana', 'codigo_iso' => 'ECU'],
            ['nombre' => 'Colombiana', 'codigo_iso' => 'COL'],
            ['nombre' => 'Peruana',     'codigo_iso' => 'PER'],
            ['nombre' => 'Venezolana',  'codigo_iso' => 'VEN'],
            ['nombre' => 'Argentina',   'codigo_iso' => 'ARG'],
            ['nombre' => 'Chilena',     'codigo_iso' => 'CHL'],
            ['nombre' => 'Boliviana',   'codigo_iso' => 'BOL'],
            ['nombre' => 'Brasileña',   'codigo_iso' => 'BRA'],
            ['nombre' => 'Uruguaya',    'codigo_iso' => 'URY'],
            ['nombre' => 'Cubana',    'codigo_iso' => 'CUB'],
        ]);
    }
}
