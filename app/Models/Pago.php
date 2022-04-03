<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Pago extends Model
{
    use HasFactory;
    use Authenticatable, CanResetPassword, Sortable;

    protected $table='pagos';

    public $sortable = [
        'id',
        'fecha_pago',
        'id_proveedor',
        'id_forma_de_pago',
        'total',
        'created_at',
        'updated_at'
    ];

    public function formaDePago() {
        return $this->belongsTo(FormaDePago::class, 'id_forma_de_pago');
    }

    public function proveedor() {
        return $this->belongsTo(Proveedor::class, 'id_proveedor');
    }
}
