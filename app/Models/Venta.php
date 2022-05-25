<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Venta extends Model
{
    use HasFactory;
    use Authenticatable, CanResetPassword, Sortable;

    protected $table='ventas';

    public $sortable = [
        'id',
        'id_periodo',
        'fecha_comprobante',
        'id_punto_de_venta',
        'numero_comprobante',
        'id_cliente',
        'no_gravado',
        'gravado',
        'iva_21',
        'total',
        'cobrada',
        'created_at',
        'updated_at'
    ];

    public function periodo() {
        return $this->belongsTo(Periodo::class, 'id_periodo');
    }

    public function puntoDeVenta() {
        return $this->belongsTo(PuntoDeVenta::class, 'id_punto_de_venta');
    }

    public function cliente() {
        return $this->belongsTo(Cliente::class, 'id_cliente');
    }
}
