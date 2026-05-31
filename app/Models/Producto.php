<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    //
    public function almacenamientoTipo()
    {
        return $this->belongsTo(AlmacenamientoTipo::class);
    }

     public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function unidad()
    {
        return $this->belongsTo(Unidad::class);
    }

    public function lotes(){
        return $this->hasMany(Lote::class);
    }

    public function presentacion()
    {
         return $this->hasOne(Presentacion::class);
    }
}
