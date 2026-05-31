<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AtencionMovimiento extends Model
{
    //
     public function estancia(){
        return $this->belongsTo(Atencion::class);
    }

    public function areaSalud(){
        return $this->belongsTo(AreaSalud::class);
    }
}
