<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Unidad extends Model
{
    //
     public function tipoUnidad()
    {
        return $this->belongsTo(TipoUnidad::class);
    }

    public function productos(){
        return $this->hasMany(Producto::class);
    }
}
