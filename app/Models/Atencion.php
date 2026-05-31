<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Atencion extends Model
{
    //
    public function paciente(){
        return $this->belongsTo(Paciente::class);
    }

    public function cita(){
        return $this->belongsTo(Cita::class);
    }

    public function estanciaMovimientos(){
        return $this->hasMany(AtencionMovimiento::class);
    }

     public function preparacion(){
        return $this->belongsTo(Preparacion::class);
    }

     public function areaSaludOrigen(){
        return $this->belongsTo(AreaSalud::class,'area_salud_id');
    }

     public function areaSaludActual(){
        return $this->belongsTo(AreaSalud::class,'area_salud_actual_id');
    }

    public function signosVitales(){
        return $this->hasMany(SignosVitale::class);
    }

}
