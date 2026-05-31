<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Formulario008Evento extends Model
{
    //

    /*public function eventoTipos(){
        return $this->belongsToMany(EventoTipo::class, 'formulario008_detalle_evento')
            ->withTimestamps();
    }*/

    /*public function eventoTipos()
    {
        return $this->belongsToMany(
            EventoTipo::class,
            'evento_tipo_formulario008_evento',           // nombre de la tabla pivote
            'formulario008_evento_id',                    // nombre de esta clave (FK hacia este modelo)
            'evento_tipo_id'                              // nombre de la otra clave (FK hacia el otro modelo)
        )->withTimestamps();
    }*/

    public function eventoTipos()
    {
        return $this->belongsToMany(EventoTipo::class)
            ->withTimestamps();
        //->withPivot(["cantidad"]);
    }
}
