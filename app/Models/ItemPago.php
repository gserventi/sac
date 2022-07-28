<?php

namespace App\Models;

use Eloquent;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Carbon;
use Kyslik\ColumnSortable\Sortable;

/**
 * App\Models\ItemPago
 *
 * @property int $id
 * @property int $id_pago
 * @property int $id_compra
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property int $updated_by
 * @property-read Collection|Compra[] $compras
 * @property-read int|null $compras_count
 * @property-read Pago $pago
 * @method static Builder|ItemPago newModelQuery()
 * @method static Builder|ItemPago newQuery()
 * @method static Builder|ItemPago query()
 * @method static Builder|ItemPago sortable($defaultParameters = null)
 * @method static Builder|ItemPago whereCreatedAt($value)
 * @method static Builder|ItemPago whereId($value)
 * @method static Builder|ItemPago whereIdCompra($value)
 * @method static Builder|ItemPago whereIdPago($value)
 * @method static Builder|ItemPago whereUpdatedAt($value)
 * @method static Builder|ItemPago whereUpdatedBy($value)
 * @mixin Eloquent
 */
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

    /**
     * Devuelve la cabecera del pago asociada a los items
     *
     * @return BelongsTo
     */
    public function pago(): BelongsTo
    {
        return $this->belongsTo(Pago::class, 'id_pago');
    }

    /**
     * Devuelve la compra asociada a los items de pago
     *
     * @return BelongsToMany
     */
    public function compras(): BelongsToMany
    {
        return $this->belongsToMany(Compra::class, 'id_compra');
    }
}
