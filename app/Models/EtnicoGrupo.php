<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EtnicoGrupo extends Model
{
    //
    public function pacientes(){
        return $this->hasMany(Paciente::class);
    }
}
