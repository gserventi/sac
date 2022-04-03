<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Cliente extends Model
{
    use HasFactory;
    use Authenticatable, CanResetPassword, Sortable;

    protected $table='clientes';

    public $sortable = [
        'id',
        'nombre',
        'cuit',
        'email',
        'telefono',
        'dias_cobro',
        'observaciones',
        'activo',
        'created_at',
        'updated_at'
    ];

    public function cuit_con_formato($cuit) {
        return substr($cuit, 0,2) . '-' . substr($cuit,2,8) . '-' . substr($cuit, 10,2);
    }
}
