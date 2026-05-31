<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaccion extends Model
{
    //
    public function tipoTransaccion()
    {
        return $this->belongsTo(TipoTransaccion::class);
    }

    public function permisos()
    {
        return $this->hasMany(BodegaTransaccionUser::class)
        ->withTimestamps();
    }

    public function bodegasPermitidas()
    {
        return $this->permisos()
            ->with('bodega')
            ->get()
            ->pluck('bodega')
            ->unique('id');
    }
}
