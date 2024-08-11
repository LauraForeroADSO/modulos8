<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registros extends Model
{
    use HasFactory;

    protected $table = 'tbl_visitantes'; // Nombre de la tabla en la base de datos

    protected $fillable = [
        'nombre',
        'edad',
        'cedula',
        'sexo',
        'telefono',
        'imagen',
        'update_at',
    ];
}
