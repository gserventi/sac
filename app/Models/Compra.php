<?php

namespace App\Models;

use Eloquent;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;
use Kyslik\ColumnSortable\Sortable;

/**
 * App\Models\Compra
 *
 * @property int $id
 * @property int $id_periodo
 * @property string $fecha_comprobante
 * @property int $id_tipo_comprobante
 * @property string $numero_comprobante
 * @property int $id_proveedor
 * @property float|null $exento
 * @property float|null $no_gravado
 * @property float|null $gravado
 * @property float|null $iva_21
 * @property float|null $iva_27
 * @property float|null $iva_105
 * @property float|null $percepcion_iva_RG3337_3
 * @property float|null $percepcion_iva_RG3337_105
 * @property float|null $percepcion_iibb_caba_15
 * @property float|null $percepcion_iibb_ba_01
 * @property float $neto
 * @property int $pagada
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property int $updated_by
 * @property-read Periodo $periodo
 * @property-read Proveedor $proveedor
 * @property-read TipoDeComprobante $tipoDeComprobante
 * @method static Builder|Compra newModelQuery()
 * @method static Builder|Compra newQuery()
 * @method static Builder|Compra query()
 * @method static Builder|Compra sortable($defaultParameters = null)
 * @method static Builder|Compra whereCreatedAt($value)
 * @method static Builder|Compra whereExento($value)
 * @method static Builder|Compra whereFechaComprobante($value)
 * @method static Builder|Compra whereGravado($value)
 * @method static Builder|Compra whereId($value)
 * @method static Builder|Compra whereIdPeriodo($value)
 * @method static Builder|Compra whereIdProveedor($value)
 * @method static Builder|Compra whereIdTipoComprobante($value)
 * @method static Builder|Compra whereIva105($value)
 * @method static Builder|Compra whereIva21($value)
 * @method static Builder|Compra whereIva27($value)
 * @method static Builder|Compra whereNeto($value)
 * @method static Builder|Compra whereNoGravado($value)
 * @method static Builder|Compra whereNumeroComprobante($value)
 * @method static Builder|Compra wherePagada($value)
 * @method static Builder|Compra wherePercepcionIibbBa01($value)
 * @method static Builder|Compra wherePercepcionIibbCaba15($value)
 * @method static Builder|Compra wherePercepcionIvaRG3337105($value)
 * @method static Builder|Compra wherePercepcionIvaRG33373($value)
 * @method static Builder|Compra whereUpdatedAt($value)
 * @method static Builder|Compra whereUpdatedBy($value)
 * @mixin Eloquent
 */
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

    /**
     * Devuelve el periodo asociado a una compra
     *
     * @return BelongsTo
     */
    public function periodo(): BelongsTo
    {
        return $this->belongsTo(Periodo::class, 'id_periodo');
    }

    /**
     * Devuelve el tipo de comprobante asociado a una compra
     *
     * @return BelongsTo
     */
    public function tipoDeComprobante(): BelongsTo
    {
        return $this->belongsTo(TipoDeComprobante::class, 'id_tipo_comprobante');
    }

    /**
     * Devuelve el proveedor asociado a una compra
     *
     * @return BelongsTo
     */
    public function proveedor(): BelongsTo
    {
        return $this->belongsTo(Proveedor::class, 'id_proveedor');
    }

}
