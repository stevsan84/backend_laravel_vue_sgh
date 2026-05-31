<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoTransaccion extends Model
{
    //
    public function transaccions(){
        return $this->hasMany(Transaccion::class);
    }
}
