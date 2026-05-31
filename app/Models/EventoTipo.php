<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventoTipo extends Model
{
    //

    /*public function formulario008Eventos(){
        return $this->belongsToMany(Formulario008Evento::class, 'formulario008_detalle_evento')
            ->withTimestamps();
    }*/

    /*public function formulario008Eventos()
    {
        return $this->belongsToMany(
            Formulario008Evento::class,
            'evento_tipo_formulario008_evento',           // tabla pivote
            'evento_tipo_id',                             // clave de este modelo
            'formulario008_evento_id'                     // clave del otro modelo
        )->withTimestamps();
    }*/

    public function formulario008Eventos()
    {
        return $this->belongsToMany(Formulario008Evento::class)
            ->withTimestamps();
        //->withPivot(["cantidad"]);
    }

    public function evento(){
        return $this->belongsTo(Evento::class);
    }
}
