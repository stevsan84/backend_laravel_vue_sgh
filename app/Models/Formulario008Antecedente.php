<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Formulario008Antecedente extends Model
{
    //
    public function antecedentes(){
        return $this->belongsToMany(Antecedente::class)
            ->withTimestamps();
            //->withPivot(["cantidad"]);
    }
}
