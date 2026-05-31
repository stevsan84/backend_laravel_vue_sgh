<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cie10 extends Model
{
    //
    //protected $table = 'cie10';

    protected $fillable = [
        'clave',
        'nombre',
        'estado',
    ];

     // Si quieres usar los id del Excel y no autoincrementar
    //public $incrementing = false;
    //protected $keyType = 'int';

    public function formulario008Diagnosticos(){
        return $this->belongsToMany(Formulario008Diagnostico::class)
            ->withTimestamps()
            ->withPivot(["condicion"])
            ->withPivot(["cronologia"]);
    }
}
