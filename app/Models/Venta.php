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
 * App\Models\Venta
 *
 * @property int $id
 * @property int $id_periodo
 * @property string $fecha_comprobante
 * @property int $id_punto_de_venta
 * @property string $numero_comprobante
 * @property int $id_cliente
 * @property float|null $no_gravado
 * @property float|null $gravado
 * @property float $iva_21
 * @property float $total
 * @property int $cobrada
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property int $updated_by
 * @property-read Cliente $cliente
 * @property-read Periodo $periodo
 * @property-read PuntoDeVenta $puntoDeVenta
 * @method static Builder|Venta newModelQuery()
 * @method static Builder|Venta newQuery()
 * @method static Builder|Venta query()
 * @method static Builder|Venta sortable($defaultParameters = null)
 * @method static Builder|Venta whereCobrada($value)
 * @method static Builder|Venta whereCreatedAt($value)
 * @method static Builder|Venta whereFechaComprobante($value)
 * @method static Builder|Venta whereGravado($value)
 * @method static Builder|Venta whereId($value)
 * @method static Builder|Venta whereIdCliente($value)
 * @method static Builder|Venta whereIdPeriodo($value)
 * @method static Builder|Venta whereIdPuntoDeVenta($value)
 * @method static Builder|Venta whereIva21($value)
 * @method static Builder|Venta whereNoGravado($value)
 * @method static Builder|Venta whereNumeroComprobante($value)
 * @method static Builder|Venta whereTotal($value)
 * @method static Builder|Venta whereUpdatedAt($value)
 * @method static Builder|Venta whereUpdatedBy($value)
 * @mixin Eloquent
 */
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

    /**
     * Periodo asociado a una venta
     *
     * @return BelongsTo
     */
    public function periodo(): BelongsTo
    {
        return $this->belongsTo(Periodo::class, 'id_periodo');
    }

    /**
     * Punto de venta asociado a una venta
     *
     * @return BelongsTo
     */
    public function puntoDeVenta(): BelongsTo
    {
        return $this->belongsTo(PuntoDeVenta::class, 'id_punto_de_venta');
    }

    /**
     * Cliente asociado a una venta
     *
     * @return BelongsTo
     */
    public function cliente(): BelongsTo
    {
        return $this->belongsTo(Cliente::class, 'id_cliente');
    }
}
