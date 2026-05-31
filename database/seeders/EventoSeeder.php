<?php

namespace Database\Seeders;

use App\Models\Evento;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $evento = new Evento();
        $evento->nombre = 'Accidente';
        $evento->save();

        $evento = new Evento();
        $evento->nombre = 'Violencia';
        $evento->save();

        $evento = new Evento();
        $evento->nombre = 'Intoxicación';
        $evento->save();
    }
}
