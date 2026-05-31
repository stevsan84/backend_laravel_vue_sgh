<?php

namespace Database\Seeders;

use App\Models\EventoTipo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventoTipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $eventoTipo = new EventoTipo();
        $eventoTipo->evento_id = 1;
        $eventoTipo->nombre = 'Accidente de transito';
        $eventoTipo->save();

        $eventoTipo = new EventoTipo();
        $eventoTipo->evento_id = 1;
        $eventoTipo->nombre = 'Caída';
        $eventoTipo->save();

        $eventoTipo = new EventoTipo();
        $eventoTipo->evento_id = 1;
        $eventoTipo->nombre = 'Quemadura';
        $eventoTipo->save();

        $eventoTipo = new EventoTipo();
        $eventoTipo->evento_id = 1;
        $eventoTipo->nombre = 'Mordedura';
        $eventoTipo->save();

        $eventoTipo = new EventoTipo();
        $eventoTipo->evento_id = 1;
        $eventoTipo->nombre = 'Ahogamiento';
        $eventoTipo->save();

        $eventoTipo = new EventoTipo();
        $eventoTipo->evento_id = 1;
        $eventoTipo->nombre = 'Cuerpo extraño';
        $eventoTipo->save();

        $eventoTipo = new EventoTipo();
        $eventoTipo->evento_id = 1;
        $eventoTipo->nombre = 'Aplastamiento';
        $eventoTipo->save();

        $eventoTipo = new EventoTipo();
        $eventoTipo->evento_id = 1;
        $eventoTipo->nombre = 'Otro accidente';
        $eventoTipo->save();

        $eventoTipo = new EventoTipo();
        $eventoTipo->evento_id = 2;
        $eventoTipo->nombre = 'Violencia por arma de fuego';
        $eventoTipo->save();

        $eventoTipo = new EventoTipo();
        $eventoTipo->evento_id = 2;
        $eventoTipo->nombre = 'Violencia por arma c. Punzante';
        $eventoTipo->save();

        $eventoTipo = new EventoTipo();
        $eventoTipo->evento_id = 2;
        $eventoTipo->nombre = 'Violencia por riña';
        $eventoTipo->save();

        $eventoTipo = new EventoTipo();
        $eventoTipo->evento_id = 2;
        $eventoTipo->nombre = 'Violencia familiar';
        $eventoTipo->save();

        $eventoTipo = new EventoTipo();
        $eventoTipo->evento_id = 2;
        $eventoTipo->nombre = 'Presunta violencia física';
        $eventoTipo->save();

        $eventoTipo = new EventoTipo();
        $eventoTipo->evento_id = 2;
        $eventoTipo->nombre = 'Presunta violencia psicológica';
        $eventoTipo->save();

        $eventoTipo = new EventoTipo();
        $eventoTipo->evento_id = 2;
        $eventoTipo->nombre = 'Presunta violencia sexual';
        $eventoTipo->save();

        $eventoTipo = new EventoTipo();
        $eventoTipo->evento_id = 3;
        $eventoTipo->nombre = 'Intoxicación alcohólica';
        $eventoTipo->save();

         $eventoTipo = new EventoTipo();
        $eventoTipo->evento_id = 3;
        $eventoTipo->nombre = 'Intoxicación alimentaria';
        $eventoTipo->save();

        $eventoTipo = new EventoTipo();
        $eventoTipo->evento_id = 3;
        $eventoTipo->nombre = 'Intoxicación por drogas';
        $eventoTipo->save();

        $eventoTipo = new EventoTipo();
        $eventoTipo->evento_id = 3;
        $eventoTipo->nombre = 'Inhalación de gases';
        $eventoTipo->save();

        $eventoTipo = new EventoTipo();
        $eventoTipo->evento_id = 3;
        $eventoTipo->nombre = 'Otra intoxicación';
        $eventoTipo->save();

        $eventoTipo = new EventoTipo();
        $eventoTipo->evento_id = 3;
        $eventoTipo->nombre = 'Picadura';
        $eventoTipo->save();

        $eventoTipo = new EventoTipo();
        $eventoTipo->evento_id = 3;
        $eventoTipo->nombre = 'Envenenamiento';
        $eventoTipo->save();

        $eventoTipo = new EventoTipo();
        $eventoTipo->evento_id = 3;
        $eventoTipo->nombre = 'Anafilaxia';
        $eventoTipo->save();
    }
}
