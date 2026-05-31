<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AreaSalud extends Model
{
    //
    public function estancias(){
        return $this->hasMany(Atencion::class);
    }

     public function estanciaMovimientos(){
        return $this->hasMany(AtencionMovimiento::class);
    }

    public function preparacions(){
        return $this->hasMany(Preparacion::class);
    }

    public function signosVitales(){
        return $this->hasMany(SignosVitale::class);
    }

    
}
