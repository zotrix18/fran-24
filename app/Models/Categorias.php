<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorias extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_categoria';

    protected $fillable = [
        'nombre',
        'user_cambio',
        'baja',
        'created_at',
        'updated_at'
    ];
}
