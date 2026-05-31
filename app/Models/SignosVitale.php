<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SignosVitale extends Model
{
    //
     public function estancia(){
        return $this->belongsTo(Atencion::class);
    }

    public function paciente(){
        return $this->belongsTo(Paciente::class);
    }

    public function preparacion(){
        return $this->belongsTo(Preparacion::class);
    }

    public function areaSalud(){
        return $this->belongsTo(AreaSalud::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    /*public function citas(){
        return $this->hasMany(Cita::class);
    }

    public function estancias(){
        return $this->hasMany(Estancia::class);
    }*/
}
