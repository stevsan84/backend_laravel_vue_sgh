<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EducacionEstadoNivel extends Model
{
    //
    public function pacientes(){
        return $this->hasMany(Paciente::class);
    }
}
