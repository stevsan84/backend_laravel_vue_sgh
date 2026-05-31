<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lote extends Model
{
    //
    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }
    public function laboratorioFabricante()
    {
        return $this->belongsTo(LaboratorioFabricante::class);
    }
}
