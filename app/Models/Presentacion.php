<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Presentacion extends Model
{
    //

    protected $fillable = [
        'producto_id',
        'empaque_presentacion_id',
        'presentacion_unidad_id',
        'cantidad',
    ];

    public function productos(){
        return $this->belongsTo(Producto::class);
    }

    public function empaquePresentacion(){
        return $this->belongsTo(EmpaquePresentacion::class);
    }

    public function presentacionUnidad(){
        return $this->belongsTo(PresentacionUnidad::class);
    }

}
