<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    //
    public function identificacionTipo()
    {
        return $this->belongsTo(IdentificacionTipo::class);
    }

    public function nacionalidad()
    {
        return $this->belongsTo(Nacionalidad::class);
    }

    public function pais()
    {
        return $this->belongsTo(Pais::class);
    }

    public function provincia()
    {
        return $this->belongsTo(Provincia::class);
    }

    public function canton()
    {
        return $this->belongsTo(Canton::class);
    }

    public function parroquia()
    {
        return $this->belongsTo(Parroquia::class);
    }

    public function etnicoGrupo()
    {
        return $this->belongsTo(EtnicoGrupo::class);
    }

    public function indigenaNacionalidad()
    {
        return $this->belongsTo(IndigenaNacionalidad::class);
    }

    public function indigenaPueblo()
    {
        return $this->belongsTo(IndigenaPueblo::class);
    }

    public function educacionNivel()
    {
        return $this->belongsTo(EducacionNivel::class);
    }

    public function educacionEstadoNivel()
    {
        return $this->belongsTo(EducacionEstadoNivel::class);
    }

    public function saludSeguro()
    {
        return $this->belongsTo(SaludSeguro::class);
    }

    /*public function bonoSolidario()
    {
        return $this->belongsTo(BonoSolidario::class);
    }*/

    public function familiarParentesco()
    {
        return $this->belongsTo(FamiliarParentesco::class);
    }

    public function citas()
    {
        return $this->hasMany(Cita::class);
    }

    public function estancias()
    {
        return $this->hasMany(Atencion::class);
    }

    public function preparacions()
    {
        return $this->hasMany(Preparacion::class);
    }

    public function signosVitales()
    {
        return $this->hasMany(SignosVitale::class);
    }
}
