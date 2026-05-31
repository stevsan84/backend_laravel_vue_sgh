<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    //
     public function almacenamientoTipo()
    {
        return $this->belongsTo(AlmacenamientoTipo::class);
    }
    
    public function productos(){
        return $this->hasMany(Producto::class);
    }
}
