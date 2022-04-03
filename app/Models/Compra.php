<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Compra extends Model
{
    use HasFactory;
    use Authenticatable, CanResetPassword, Sortable;

    protected $table='compras';

    public $sortable = [
        'id',
        'id_periodo',
        'fecha_comprobante',
        'id_tipo_comprobante',
        'numero_comprobante',
        'id_proveedor',
        'exento',
        'no_gravado',
        'gravado',
        'iva_21',
        'iva_27',
        'iva_105',
        'percepcion_iva_RG3337_3',
        'percepcion_iva_RG3337_105',
        'percepcion_iibb_caba_15',
        'percepcion_iibb_ba_01',
        'neto',
        'pagada',
        'created_at',
        'updated_at'
    ];

    public function periodo() {
        return $this->belongsTo(Periodo::class, 'id_periodo');
    }

    public function tipoDeComprobante() {
        return $this->belongsTo(TipoDeComprobante::class, 'id_tipo_comprobante');
    }

    public function proveedor() {
        return $this->belongsTo(Proveedor::class, 'id_proveedor');
    }

}
