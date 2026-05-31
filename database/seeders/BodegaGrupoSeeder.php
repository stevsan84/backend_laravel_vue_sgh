<?php

namespace Database\Seeders;

use App\Models\BodegaGrupo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BodegaGrupoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $bodegaGrupo = new BodegaGrupo();
        $bodegaGrupo->nombre = 'Bodega Cartera Servicios';
        $bodegaGrupo->save();

        $bodegaGrupo = new BodegaGrupo();
        $bodegaGrupo->nombre = 'Bodega de Farmacia';
        $bodegaGrupo->save();

        $bodegaGrupo = new BodegaGrupo();
        $bodegaGrupo->nombre = 'Bodega de Tránsito';
        $bodegaGrupo->save();

        $bodegaGrupo = new BodegaGrupo();
        $bodegaGrupo->nombre = 'Bodega General';
        $bodegaGrupo->save();
    }
}
