<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoUnidad extends Model
{
    //
    public function unidads(){
        return $this->hasMany(Unidad::class);
    }
}
