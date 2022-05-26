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
 * App\Models\Proveedor
 *
 * @property int $id
 * @property string $nombre
 * @property string $cuit
 * @property string|null $email
 * @property string|null $telefono
 * @property int|null $id_rubro
 * @property int|null $dias_pago
 * @property int $id_porcentaje_iva
 * @property int|null $id_forma_de_pago_default
 * @property int $id_tipo_comprobante
 * @property string|null $observaciones
 * @property int $activo
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property int $updated_by
 * @property-read FormaDePago|null $formaDePago
 * @property-read PorcentajeIVA $porcentajeIVA
 * @property-read Rubro|null $rubro
 * @property-read TipoDeComprobante $tipoDeComprobante
 * @method static Builder|Proveedor newModelQuery()
 * @method static Builder|Proveedor newQuery()
 * @method static Builder|Proveedor query()
 * @method static Builder|Proveedor sortable($defaultParameters = null)
 * @method static Builder|Proveedor whereActivo($value)
 * @method static Builder|Proveedor whereCreatedAt($value)
 * @method static Builder|Proveedor whereCuit($value)
 * @method static Builder|Proveedor whereDiasPago($value)
 * @method static Builder|Proveedor whereEmail($value)
 * @method static Builder|Proveedor whereId($value)
 * @method static Builder|Proveedor whereIdFormaDePagoDefault($value)
 * @method static Builder|Proveedor whereIdPorcentajeIva($value)
 * @method static Builder|Proveedor whereIdRubro($value)
 * @method static Builder|Proveedor whereIdTipoComprobante($value)
 * @method static Builder|Proveedor whereNombre($value)
 * @method static Builder|Proveedor whereObservaciones($value)
 * @method static Builder|Proveedor whereTelefono($value)
 * @method static Builder|Proveedor whereUpdatedAt($value)
 * @method static Builder|Proveedor whereUpdatedBy($value)
 * @mixin Eloquent
 */
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

    /**
     * Rubro asociado a un proveedor
     *
     * @return BelongsTo
     */
    public function rubro(): BelongsTo
    {
        return $this->belongsTo(Rubro::class,'id_rubro');
    }

    /**
     * Porcentaje de IVA por defecto para un proveedor
     * @return BelongsTo
     */
    public function porcentajeIVA(): BelongsTo
    {
        return $this->belongsTo(PorcentajeIVA::class,'id_porcentaje_iva');
    }

    /**
     * Forma de pago por defecto para un proveedor
     *
     * @return BelongsTo
     */
    public function formaDePago(): BelongsTo
    {
        return $this->belongsTo(FormaDePago::class,'id_forma_de_pago_default');
    }

    /**
     * Tipos de Comprobante por defecto para un proveedor
     *
     * @return BelongsTo
     */
    public function tipoDeComprobante(): BelongsTo
    {
        return $this->belongsTo(TipoDeComprobante::class,'id_tipo_comprobante');
    }

    /**
     * Devuelve el CUIT formateado con guiones
     *
     * @param $cuit
     * @return string
     */
    public function cuit_con_formato($cuit): string
    {
        return substr($cuit, 0,2) . '-' . substr($cuit,2,8) . '-' . substr($cuit, 10,2);
    }
}
