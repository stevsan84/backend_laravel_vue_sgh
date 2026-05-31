<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    //
    public function paciente()
    {
        return $this->belongsTo(Paciente::class);
    }

    public function persona()
    {
        return $this->belongsTo(Persona::class);
    }

    public function portafolioServicio()
    {
        return $this->belongsTo(PortafolioServicio::class);
    }

    public function estancia(){
        return $this->belongsTo(Atencion::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    /*public function getHoraInicioAttribute()
    {
        return Carbon::parse($this->fecha_inicio)->format('H:i');
    }*/
}
