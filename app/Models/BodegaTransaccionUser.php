<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BodegaTransaccionUser extends Model
{
    //

    protected $fillable = [
        'user_id',
        'bodega_id',
        'transaccion_id'
    ];
    
    public function bodega()
    {
        return $this->belongsTo(Bodega::class);
    }

    public function transaccion()
    {
        return $this->belongsTo(Transaccion::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
