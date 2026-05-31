<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Formulario008Diagnostico extends Model
{
    //
     public function cie10s(){
        return $this->belongsToMany(Cie10::class)
            ->withTimestamps()
            ->withPivot(["condicion"])
            ->withPivot(["cronologia"]);
    }

}
