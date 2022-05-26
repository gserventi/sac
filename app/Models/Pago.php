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
 * App\Models\Pago
 *
 * @property int $id
 * @property string $fecha_pago
 * @property int $id_proveedor
 * @property int $id_forma_de_pago
 * @property float $total
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property int $updated_by
 * @property-read FormaDePago $formaDePago
 * @property-read Proveedor $proveedor
 * @method static Builder|Pago newModelQuery()
 * @method static Builder|Pago newQuery()
 * @method static Builder|Pago query()
 * @method static Builder|Pago sortable($defaultParameters = null)
 * @method static Builder|Pago whereCreatedAt($value)
 * @method static Builder|Pago whereFechaPago($value)
 * @method static Builder|Pago whereId($value)
 * @method static Builder|Pago whereIdFormaDePago($value)
 * @method static Builder|Pago whereIdProveedor($value)
 * @method static Builder|Pago whereTotal($value)
 * @method static Builder|Pago whereUpdatedAt($value)
 * @method static Builder|Pago whereUpdatedBy($value)
 * @mixin Eloquent
 */
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

    /**
     * Devuelve la forma de pago asociada a un pago
     *
     * @return BelongsTo
     */
    public function formaDePago(): BelongsTo
    {
        return $this->belongsTo(FormaDePago::class, 'id_forma_de_pago');
    }

    /**
     * Devuelve el proveedor asociado a un pago
     *
     * @return BelongsTo
     */
    public function proveedor(): BelongsTo
    {
        return $this->belongsTo(Proveedor::class, 'id_proveedor');
    }
}
