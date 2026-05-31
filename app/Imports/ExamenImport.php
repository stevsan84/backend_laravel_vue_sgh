<?php

namespace App\Imports;

use App\Models\Examen;
use Maatwebsite\Excel\Concerns\ToModel;

class ExamenImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // Saltar cabecera
        if ($row[0] === 'id' || $row[0] === null) {
            return null;
        }

        return new Examen([
            //
             //'id'     => $row[0],
            'nombre'  => $row[1],
            'tipo' => $row[2],
            'categoria_examen_id' => $row[3],
            'orden' => $row[4],
            'user_id' => $row[5],
            'estado' => $row[6],
        ]);
    }
}
