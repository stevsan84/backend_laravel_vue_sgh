<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasApiTokens, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function persona()
    {
        return $this->hasOne(Persona::class);
    }

    public function citas()
    {
        return $this->hasMany(Cita::class);
    }

    public function preparacions()
    {
        return $this->hasMany(Preparacion::class);
    }

    public function signosVitales()
    {
        return $this->hasMany(SignosVitale::class);
    }

    public function admisionPacientes()
    {
        return $this->hasMany(AdmisionPaciente::class);
    }

    public function bodegaTransacciones()
    {
        return $this->hasMany(BodegaTransaccionUser::class)
         ->withTimestamps();
    }

    public function bodegasPermitidas()
    {
        return $this->bodegaTransacciones()
            ->with('bodega')
            ->get()
            ->pluck('bodega')
            ->unique('id')
            ->values();
    }

    public function transaccionesPermitidos($bodegaId)
    {
        return $this->bodegaTransacciones()
            ->where('bodega_id', $bodegaId)
            ->with('transaccion')
            ->get()
            ->pluck('transaccion');
    }
}
