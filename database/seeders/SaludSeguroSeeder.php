<?php

namespace Database\Seeders;

use App\Models\SaludSeguro;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SaludSeguroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $seguroSalud = new SaludSeguro();
        $seguroSalud->nombre = 'ISSFA';
        $seguroSalud->save();

        $seguroSalud = new SaludSeguro();
        $seguroSalud->nombre = 'ISSPOL';
        $seguroSalud->save();

        $seguroSalud = new SaludSeguro();
        $seguroSalud->nombre = 'IESS GENERAL';
        $seguroSalud->save();

        $seguroSalud = new SaludSeguro();
        $seguroSalud->nombre = 'IESS CAMPESINO';
        $seguroSalud->save();

        $seguroSalud = new SaludSeguro();
        $seguroSalud->nombre = 'Jubilado';
        $seguroSalud->save();

        $seguroSalud = new SaludSeguro();
        $seguroSalud->nombre = 'Seguro Privado';
        $seguroSalud->save();

        $seguroSalud = new SaludSeguro();
        $seguroSalud->nombre = 'Seguro Indirecto';
        $seguroSalud->save();

        $seguroSalud = new SaludSeguro();
        $seguroSalud->nombre = 'No Posee';
        $seguroSalud->save();
    }
}
