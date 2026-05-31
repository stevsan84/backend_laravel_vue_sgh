<?php

namespace Database\Seeders;

use App\Models\TipoUnidad;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoUnidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $tipoUnidad = new TipoUnidad();
        $tipoUnidad->nombre = 'Medida de Cantidad';
        $tipoUnidad->descripcion = 'Cuenta o número de elementos individuales.';
        $tipoUnidad->save();

        $tipoUnidad = new TipoUnidad();
        $tipoUnidad->nombre = 'Medida de Peso';
        $tipoUnidad->descripcion = 'Peso de un ingrediente o producto sólido.';
        $tipoUnidad->save();

        $tipoUnidad = new TipoUnidad();
        $tipoUnidad->nombre = 'Medida de Volumen';
        $tipoUnidad->descripcion = 'Cantidad de líquido.';
        $tipoUnidad->save();

        $tipoUnidad = new TipoUnidad();
        $tipoUnidad->nombre = 'Medida de Dosis';
        $tipoUnidad->descripcion = 'Dosis que indica potencia o concentración.';
        $tipoUnidad->save();

        $tipoUnidad = new TipoUnidad();
        $tipoUnidad->nombre = 'Medida de Longitud';
        $tipoUnidad->descripcion = 'Para materiales o dispositivos que se miden por largo.';
        $tipoUnidad->save();

        $tipoUnidad = new TipoUnidad();
        $tipoUnidad->nombre = 'Medida de Superficie';
        $tipoUnidad->descripcion = 'En casos de parches o cremas aplicadas por área.';
        $tipoUnidad->save();

        $tipoUnidad = new TipoUnidad();
        $tipoUnidad->nombre = 'Medida de Tiempo (uso farmacológico)';
        $tipoUnidad->descripcion = 'En algunos registros de tratamientos o frecuencia.';
        $tipoUnidad->save();

        $tipoUnidad = new TipoUnidad();
        $tipoUnidad->nombre = 'Otra / Especial';
        $tipoUnidad->descripcion = 'Cualquier unidad personalizada o no estándar.';
        $tipoUnidad->save();

    }
}
