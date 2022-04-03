<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Proveedor extends Model
{
    use HasFactory;
    use Authenticatable, CanResetPassword, Sortable;

    protected $table='proveedores';

    public $sortable = [
        'id',
        'nombre',
        'cuit',
        'email',
        'telefono',
        'id_rubro',
        'dias_pago',
        'id_porcentaje_iva',
        'id_forma_de_pago_default',
        'id_tipo_comprobante',
        'observaciones',
        'activo',
        'created_at',
        'updated_at'
    ];

    public function rubro() {
        return $this->belongsTo(Rubro::class,'id_rubro');
    }

    public function porcentajeIVA() {
        return $this->belongsTo(PorcentajeIVA::class,'id_porcentaje_iva');
    }

    public function formaDePago() {
        return $this->belongsTo(FormaDePago::class,'id_forma_de_pago_default');
    }

    public function tipoDeComprobante() {
        return $this->belongsTo(TipoDeComprobante::class,'id_tipo_comprobante');
    }

    public function cuit_con_formato($cuit) {
        return substr($cuit, 0,2) . '-' . substr($cuit,2,8) . '-' . substr($cuit, 10,2);
    }
}
