<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class TipoDeComprobante extends Model
{
    use HasFactory;
    use Authenticatable, CanResetPassword, Sortable;

    protected $table='tipos_de_comprobantes';

    public $sortable = [
        'id',
        'nombre',
        'iva_compras',
        'activo',
        'created_at',
        'updated_at'
    ];
}
