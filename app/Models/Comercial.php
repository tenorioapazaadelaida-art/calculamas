<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comercial extends Model
{
    protected $table = 'comercial';

    protected $fillable = [
        'descripcion',
        'responsable'
    ];
}