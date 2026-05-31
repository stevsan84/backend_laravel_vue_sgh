<?php

namespace Database\Seeders;

use App\Models\Pais;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Pais::create([
            'nombre' => 'ARGENTINA',
            //'estado' => 1,
           ]);
           Pais::create([
            'nombre' => 'BOLIVIA',
            //'estado' => 1,
           ]);
           Pais::create([
            'nombre' => 'CHILE',
            //'estado' => 1,
           ]);
           Pais::create([
            'nombre' => 'CHINA',
            //'estado' => 1,
           ]);
           Pais::create([
            'nombre' => 'COLOMBIA',
            //'estado' => 1,
           ]);
           Pais::create([
            'nombre' => 'CUBA',
            //'estado' => 1,
           ]);
           Pais::create([
            'nombre' => 'ECUADOR',
            //'estado' => 1,
           ]);
           Pais::create([
            'nombre' => 'EEUU',
            //'estado' => 1,
           ]);
           Pais::create([
            'nombre' => 'ESPAÑA',
            //'estado' => 1,
           ]);
           Pais::create([
            'nombre' => 'PERÚ',
            //'estado' => 1,
           ]);
           Pais::create([
            'nombre' => 'VENEZUELA',
            //'estado' => 1,
           ]);
           Pais::create([
            'nombre' => 'OTROS',
            //'estado' => 1,
           ]);
           
    
    }
}
