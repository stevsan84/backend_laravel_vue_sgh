<?php

namespace App\Imports;

use App\Models\Cie10;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Collection;

class Cie10Import implements ToCollection
{
    public function collection(Collection $rows)
    {
        // Eliminar la cabecera (id, clave, nombre, estado)
        $rows->shift();

        $data = [];

        foreach ($rows as $row) {
            $data[] = [
                'clave'      => $row[1],
                'nombre'     => $row[2],
                'estado'     => $row[3] ?? true,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        // Insertar en bloques de 500 registros
        foreach (array_chunk($data, 500) as $chunk) {
            Cie10::insert($chunk);
        }
    }
}
