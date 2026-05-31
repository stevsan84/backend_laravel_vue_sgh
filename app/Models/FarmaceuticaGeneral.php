<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FarmaceuticaGeneral extends Model
{
    //
     public function farmaceuticaEspecificas(){
        return $this->hasMany(FarmaceuticaEspecifica::class);
    }
}
