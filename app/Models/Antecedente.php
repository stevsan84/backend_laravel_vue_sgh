<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Antecedente extends Model
{
    //
   public function formulario008Antecedentes(){
        return $this->belongsToMany(Formulario008Antecedente::class)
            ->withTimestamps();
            //->withPivot(["cantidad"]);
    }
}
