<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class ItemPago extends Model
{
    use HasFactory;
    use Authenticatable, CanResetPassword, Sortable;

    protected $table='items_pago';

    public $sortable = [
        'id',
        'id_pago',
        'id_compra',
        'created_at',
        'updated_at'
    ];

    public function pago() {
        return $this->belongsTo(Pago::class, 'id_pago');
    }

    public function compras() {
        return $this->belongsToMany(Compra::class, 'id_compra');
    }
}
