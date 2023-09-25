<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedores extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_proveedor';
    protected $fillable = [
        'nombre',
        'id_categoria',
        'user_cambio',
        'baja',
        'created_at',
        'updated_at'
    ];
}
