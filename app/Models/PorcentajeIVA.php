<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class PorcentajeIVA extends Model
{
    use HasFactory;
    use Authenticatable, CanResetPassword, Sortable;

    protected $table='porcentajes_iva';

    public $sortable = [
        'id',
        'porcentaje',
        'activo',
        'created_at',
        'updated_at'
    ];
}
