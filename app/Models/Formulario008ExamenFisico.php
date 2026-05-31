<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Formulario008ExamenFisico extends Model
{
    //
    public function examenFisicos(){
        return $this->belongsToMany(ExamenFisico::class)
            ->withTimestamps();
            //->withPivot(["cantidad"]);
    }
}
