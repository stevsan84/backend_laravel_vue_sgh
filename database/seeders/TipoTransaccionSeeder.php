<?php

namespace Database\Seeders;

use App\Models\TipoTransaccion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoTransaccionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $tipoTransaccion = new TipoTransaccion();
        $tipoTransaccion->nombre = 'Ingreso';
        $tipoTransaccion->save();

        $tipoTransaccion = new TipoTransaccion();
        $tipoTransaccion->nombre = 'Egreso';
        $tipoTransaccion->save();


    }
}
