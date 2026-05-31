<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Preparacion extends Model
{
    //
     public function estancia(){
        return $this->belongsTo(Atencion::class);
    }

    public function areaSalud(){
        return $this->belongsTo(AreaSalud::class);
    }

     public function persona(){
        return $this->belongsTo(Persona::class);
    }

    public function paciente(){
        return $this->belongsTo(Paciente::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function preparacion(){
        return $this->belongsTo(Preparacion::class);
    }




}
