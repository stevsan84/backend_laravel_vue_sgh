<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExamenComplementario extends Model
{
    //
    public function formulario008ExamenComplementarios(){
        return $this->belongsToMany(Formulario008ExamenComplementario::class)
            ->withTimestamps();
            //->withPivot(["cantidad"]);
    }
}
