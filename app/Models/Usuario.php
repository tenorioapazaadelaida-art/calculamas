<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    protected $table = 'usuarios';

    protected $fillable = [
        'nombre',
        'correo',
        'password',
        'rol'
    ];

    protected $hidden = [
        'password'
    ];

    public function productos()
    {
        return $this->hasMany(Producto::class, 'id_usuario');
    }
}