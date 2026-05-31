<?php

namespace Database\Seeders;

use App\Models\Provincia;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProvinciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Provincia::insert([
            ['id' => 1, 'codigo' => '01', 'nombre' => 'AZUAY'],
            ['id' => 2, 'codigo' => '02', 'nombre' => 'BOLÍVAR'],
            ['id' => 3, 'codigo' => '03', 'nombre' => 'CAÑAR'],
            ['id' => 4, 'codigo' => '04', 'nombre' => 'CARCHI'],
            ['id' => 5, 'codigo' => '05', 'nombre' => 'COTOPAXI'],
            ['id' => 6, 'codigo' => '06', 'nombre' => 'CHIMBORAZO'],
            ['id' => 7, 'codigo' => '07', 'nombre' => 'EL ORO'],
            ['id' => 8, 'codigo' => '08', 'nombre' => 'ESMERALDAS'],
            ['id' => 9, 'codigo' => '09', 'nombre' => 'GUAYAS'],
            ['id' => 10, 'codigo' => '10', 'nombre' => 'IMBABURA'],
            ['id' => 11, 'codigo' => '11', 'nombre' => 'LOJA'],
            ['id' => 12, 'codigo' => '12', 'nombre' => 'LOS RÍOS'],
            ['id' => 13, 'codigo' => '13', 'nombre' => 'MANABÍ'],
            ['id' => 14, 'codigo' => '14', 'nombre' => 'MORONA SANTIAGO'],
            ['id' => 15, 'codigo' => '15', 'nombre' => 'NAPO'],
            ['id' => 16, 'codigo' => '16', 'nombre' => 'PASTAZA'],
            ['id' => 17, 'codigo' => '17', 'nombre' => 'PICHINCHA'],
            ['id' => 18, 'codigo' => '18', 'nombre' => 'TUNGURAHUA'],
            ['id' => 19, 'codigo' => '19', 'nombre' => 'ZAMORA CHINCHIPE'],
            ['id' => 20, 'codigo' => '20', 'nombre' => 'GALÁPAGOS'],
            ['id' => 21, 'codigo' => '21', 'nombre' => 'SUCUMBÍOS'],
            ['id' => 22, 'codigo' => '22', 'nombre' => 'ORELLANA'],
            ['id' => 23, 'codigo' => '23', 'nombre' => 'SANTO DOMINGO DE LOS TSÁCHILAS'],
            ['id' => 24, 'codigo' => '24', 'nombre' => 'SANTA ELENA'],
            ['id' => 25, 'codigo' => '25', 'nombre' => 'Zonas No Delimitadas'],
        ]);
    }
}
