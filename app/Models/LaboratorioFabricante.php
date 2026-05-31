<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LaboratorioFabricante extends Model
{
    //
    public function lotes(){
        return $this->hasMany(Lote::class);
    }
}
