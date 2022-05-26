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
 * App\Models\Cobro
 *
 * @property int $id
 * @property string $fecha_cobro
 * @property int $id_cliente
 * @property int $id_forma_de_pago
 * @property float $total
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property int $updated_by
 * @property-read Cliente $cliente
 * @property-read FormaDePago $formaDePago
 * @method static Builder|Cobro newModelQuery()
 * @method static Builder|Cobro newQuery()
 * @method static Builder|Cobro query()
 * @method static Builder|Cobro sortable($defaultParameters = null)
 * @method static Builder|Cobro whereCreatedAt($value)
 * @method static Builder|Cobro whereFechaCobro($value)
 * @method static Builder|Cobro whereId($value)
 * @method static Builder|Cobro whereIdCliente($value)
 * @method static Builder|Cobro whereIdFormaDePago($value)
 * @method static Builder|Cobro whereTotal($value)
 * @method static Builder|Cobro whereUpdatedAt($value)
 * @method static Builder|Cobro whereUpdatedBy($value)
 * @mixin Eloquent
 */
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

    /**
     * Devuelve el cliente asociado a un cobro
     *
     * @return BelongsTo
     */
    public function cliente(): BelongsTo
    {
        return $this->belongsTo(Cliente::class, 'id_cliente');
    }

    /**
     * Devuelve la forma de pago asociada a un cobro
     *
     * @return BelongsTo
     */
    public function formaDePago(): BelongsTo
    {
        return $this->belongsTo(FormaDePago::class, 'id_forma_de_pago');
    }
}
