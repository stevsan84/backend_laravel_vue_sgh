<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    //
    public function eventoTipos(){
        return $this->hasMany(EventoTipo::class);
    }
}
