<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class FormaDePago extends Model
{
    use HasFactory;
    use Authenticatable, CanResetPassword, Sortable;

    protected $table='formas_de_pago';

    public $sortable = [
        'id',
        'nombre',
        'activo_ventas',
        'activo_compras',
        'created_at',
        'updated_at'
    ];
}
