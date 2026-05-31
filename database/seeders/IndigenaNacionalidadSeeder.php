<?php

namespace Database\Seeders;

use App\Models\IndigenaNacionalidad;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IndigenaNacionalidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $nacionalidadIndigena = new IndigenaNacionalidad();
        $nacionalidadIndigena->nombre = 'No sabemos/No responde';
        $nacionalidadIndigena->save();

        $nacionalidadIndigena = new IndigenaNacionalidad();
        $nacionalidadIndigena->nombre = 'Achuar';
        $nacionalidadIndigena->save();

        $nacionalidadIndigena = new IndigenaNacionalidad();
        $nacionalidadIndigena->nombre = 'Awa';
        $nacionalidadIndigena->save();

        $nacionalidadIndigena = new IndigenaNacionalidad();
        $nacionalidadIndigena->nombre = 'Chachi';
        $nacionalidadIndigena->save();

        $nacionalidadIndigena = new IndigenaNacionalidad();
        $nacionalidadIndigena->nombre = 'Epera';
        $nacionalidadIndigena->save();

        $nacionalidadIndigena = new IndigenaNacionalidad();
        $nacionalidadIndigena->nombre = 'Kichwa';
        $nacionalidadIndigena->save();

        $nacionalidadIndigena = new IndigenaNacionalidad();
        $nacionalidadIndigena->nombre = 'Secoya';
        $nacionalidadIndigena->save();

        $nacionalidadIndigena = new IndigenaNacionalidad();
        $nacionalidadIndigena->nombre = 'Shuar';
        $nacionalidadIndigena->save();

        $nacionalidadIndigena = new IndigenaNacionalidad();
        $nacionalidadIndigena->nombre = 'Shwar';
        $nacionalidadIndigena->save();

        $nacionalidadIndigena = new IndigenaNacionalidad();
        $nacionalidadIndigena->nombre = 'Siona';
        $nacionalidadIndigena->save();

        $nacionalidadIndigena = new IndigenaNacionalidad();
        $nacionalidadIndigena->nombre = 'Tsáchila';
        $nacionalidadIndigena->save();

        $nacionalidadIndigena = new IndigenaNacionalidad();
        $nacionalidadIndigena->nombre = 'Waorani';
        $nacionalidadIndigena->save();

        $nacionalidadIndigena = new IndigenaNacionalidad();
        $nacionalidadIndigena->nombre = 'Zapara';
        $nacionalidadIndigena->save();

        $nacionalidadIndigena = new IndigenaNacionalidad();
        $nacionalidadIndigena->nombre = 'Andoa';
        $nacionalidadIndigena->save();
    }
}
