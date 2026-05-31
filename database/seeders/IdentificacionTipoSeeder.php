<?php

namespace Database\Seeders;

use App\Models\IdentificacionTipo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IdentificacionTipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
         $identificationType = new IdentificacionTipo();
        $identificationType->nombre = 'Cédula de Identidad';
        $identificationType->save();

        $identificationType = new IdentificacionTipo();
        $identificationType->nombre = 'Pasaporte';
        $identificationType->save();

        $identificationType = new IdentificacionTipo();
        $identificationType->nombre = 'Visa';
        $identificationType->save();

        $identificationType = new IdentificacionTipo();
        $identificationType->nombre = 'Carnet de Refugiaso';
        $identificationType->save();


        $identificationType = new IdentificacionTipo();
        $identificationType->nombre = 'Sin Documento de Identidad';
        $identificationType->save();
    }
}
