<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bodega extends Model
{
    //
    public function almacenamientoTipo()
    {
        return $this->belongsTo(AlmacenamientoTipo::class);
    }

    public function bodegaTipo()
    {
        return $this->belongsTo(BodegaTipo::class);
    }

    public function bodegaGrupo()
    {
        return $this->belongsTo(BodegaGrupo::class);
    }

    public function permisos()
    {
        return $this->hasMany(BodegaTransaccionUser::class)
                    ->withTimestamps();
    }

    public function TransaccionPermitidos()
    {
        return $this->permisos()
            ->with('transaccion')
            ->get()
            ->pluck('transaccion')
            ->unique('id');
    }
}
