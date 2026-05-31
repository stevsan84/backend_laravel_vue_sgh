<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Formulario008ExamenComplementario extends Model
{
    //
    public function examenComplementarios(){
        return $this->belongsToMany(ExamenComplementario::class)
            ->withTimestamps();
            //->withPivot(["cantidad"]);
    }
}
