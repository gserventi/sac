<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Cobro extends Model
{
    use HasFactory;
    use Authenticatable, CanResetPassword, Sortable;

    protected $table='cobros';

    public $sortable = [
        'id',
        'fecha_cobro',
        'id_cliente',
        'id_forma_de_pago',
        'total',
        'created_at',
        'updated_at'
    ];

    public function cliente() {
        return $this->belongsTo(Cliente::class, 'id_cliente');
    }

    public function formaDePago() {
        return $this->belongsTo(FormaDePago::class, 'id_forma_de_pago');
    }
}
