<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmpaquePresentacion extends Model
{
    //
    public function presentacions(){
        return $this->hasMany(Presentacion::class);
    }
}
