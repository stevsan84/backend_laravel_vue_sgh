<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BodegaTipo extends Model
{
    //
    public function bodegas(){
        return $this->hasMany(Bodega::class);
    }
}
