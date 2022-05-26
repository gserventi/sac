<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\ItemCobro
 *
 * @property int $id
 * @property int $id_cobro
 * @property int $id_venta
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property int $updated_by
 * @method static Builder|ItemCobro newModelQuery()
 * @method static Builder|ItemCobro newQuery()
 * @method static Builder|ItemCobro query()
 * @method static Builder|ItemCobro whereCreatedAt($value)
 * @method static Builder|ItemCobro whereId($value)
 * @method static Builder|ItemCobro whereIdCobro($value)
 * @method static Builder|ItemCobro whereIdVenta($value)
 * @method static Builder|ItemCobro whereUpdatedAt($value)
 * @method static Builder|ItemCobro whereUpdatedBy($value)
 * @mixin Eloquent
 */
class ItemCobro extends Model
{
    use HasFactory;
    protected $table='items_cobro';
}
