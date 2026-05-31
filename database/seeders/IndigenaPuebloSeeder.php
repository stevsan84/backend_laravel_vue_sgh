<?php

namespace Database\Seeders;

use App\Models\IndigenaPueblo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IndigenaPuebloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $puebloIndigena = new IndigenaPueblo();
        $puebloIndigena->nombre = 'No sabemos/No responde';
        $puebloIndigena->save();

        $puebloIndigena = new IndigenaPueblo();
        $puebloIndigena->nombre = 'Chibuleo';
        $puebloIndigena->save();

        $puebloIndigena = new IndigenaPueblo();
        $puebloIndigena->nombre = 'Huancavilva';
        $puebloIndigena->save();

        $puebloIndigena = new IndigenaPueblo();
        $puebloIndigena->nombre = 'Karanki';
        $puebloIndigena->save();

        $puebloIndigena = new IndigenaPueblo();
        $puebloIndigena->nombre = 'Kañari';
        $puebloIndigena->save();

        $puebloIndigena = new IndigenaPueblo();
        $puebloIndigena->nombre = 'Kayambi';
        $puebloIndigena->save();

        $puebloIndigena = new IndigenaPueblo();
        $puebloIndigena->nombre = 'Kisapincha';
        $puebloIndigena->save();

        $puebloIndigena = new IndigenaPueblo();
        $puebloIndigena->nombre = 'Kitukara';
        $puebloIndigena->save();

        $puebloIndigena = new IndigenaPueblo();
        $puebloIndigena->nombre = 'Manta';
        $puebloIndigena->save();

        $puebloIndigena = new IndigenaPueblo();
        $puebloIndigena->nombre = 'Natabuela';
        $puebloIndigena->save();

        $puebloIndigena = new IndigenaPueblo();
        $puebloIndigena->nombre = 'Otavalo';
        $puebloIndigena->save();

        $puebloIndigena = new IndigenaPueblo();
        $puebloIndigena->nombre = 'Paltas';
        $puebloIndigena->save();

        $puebloIndigena = new IndigenaPueblo();
        $puebloIndigena->nombre = 'Panzaleo';
        $puebloIndigena->save();

        $puebloIndigena = new IndigenaPueblo();
        $puebloIndigena->nombre = 'Pastos';
        $puebloIndigena->save();

        $puebloIndigena = new IndigenaPueblo();
        $puebloIndigena->nombre = 'Puruha';
        $puebloIndigena->save();

        $puebloIndigena = new IndigenaPueblo();
        $puebloIndigena->nombre = 'Salasaka';
        $puebloIndigena->save();

        $puebloIndigena = new IndigenaPueblo();
        $puebloIndigena->nombre = 'Saraguro';
        $puebloIndigena->save();

        $puebloIndigena = new IndigenaPueblo();
        $puebloIndigena->nombre = 'Tomabela';
        $puebloIndigena->save();

        $puebloIndigena = new IndigenaPueblo();
        $puebloIndigena->nombre = 'Waramka';
        $puebloIndigena->save();
    }
}
