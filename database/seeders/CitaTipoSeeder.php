<?php

namespace Database\Seeders;

use App\Models\CitaTipo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitaTipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $citaTipo = new CitaTipo();
        $citaTipo->nombre = 'Consulta';
        $citaTipo->save();

        $citaTipo = new CitaTipo();
        $citaTipo->nombre = 'Interconsulta';
        $citaTipo->save();

        $citaTipo = new CitaTipo();
        $citaTipo->nombre = 'Referencia';
        $citaTipo->save();
    }
}
