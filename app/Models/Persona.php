<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    //
    public function user(){
        return $this->belongsTo(User::class,'link_user_id','id');
    }

    public function citas(){
        return $this->hasMany(Cita::class);
    }

    public function preparacions(){
        return $this->hasMany(Preparacion::class);
    }

}
