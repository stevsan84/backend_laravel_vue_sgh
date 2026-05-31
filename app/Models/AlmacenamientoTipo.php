<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AlmacenamientoTipo extends Model
{
    //
    public function bodegas(){
        return $this->hasMany(Bodega::class);
    }

    public function categorias(){
        return $this->hasMany(Categoria::class);
    }

    public function productos(){
        return $this->hasMany(Producto::class);
    }
}
