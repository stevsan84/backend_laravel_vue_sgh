<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExamenFisico extends Model
{
    //
    public function formulario008ExamenFisicos(){
        return $this->belongsToMany(Formulario008ExamenFisico::class)
            ->withTimestamps();
            //->withPivot(["cantidad"]);
    }
}
