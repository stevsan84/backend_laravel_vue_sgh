<?php

namespace Database\Seeders;

use App\Models\AlmacenamientoTipo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AlmacenamientoTipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $almacenamientoTipo = new AlmacenamientoTipo();
        $almacenamientoTipo->nombre = 'Medicamentos';
        $almacenamientoTipo->save();

        $almacenamientoTipo = new AlmacenamientoTipo();
        $almacenamientoTipo->nombre = 'Dispositivos';
        $almacenamientoTipo->save();

        $almacenamientoTipo = new AlmacenamientoTipo();
        $almacenamientoTipo->nombre = 'Insumos';
        $almacenamientoTipo->save();

        $almacenamientoTipo = new AlmacenamientoTipo();
        $almacenamientoTipo->nombre = 'General';
        $almacenamientoTipo->save();
    }
}
