<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FarmaceuticaEspecifica extends Model
{
    //
     public function farmaceuticaGeneral()
    {
        return $this->belongsTo(FarmaceuticaGeneral::class);
    }
}
