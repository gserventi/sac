<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class PuntoDeVenta extends Model
{
    use HasFactory;
    use Authenticatable, CanResetPassword, Sortable;

    protected $table='puntos_de_venta';

    public $sortable = [
        'id',
        'nombre',
        'prefijo',
        'ultimo_numero',
        'activo',
        'created_at',
        'updated_at'
    ];
}
