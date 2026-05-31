<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IdentificacionTipo extends Model
{
    //
     public function pacientes(){
        return $this->hasMany(Paciente::class);
    }
}
