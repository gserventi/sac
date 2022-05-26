<?php

namespace App\Models;

use Eloquent;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Kyslik\ColumnSortable\Sortable;

/**
 * App\Models\PorcentajeIVA
 *
 * @property int $id
 * @property float $porcentaje
 * @property int $activo
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property int $updated_by
 * @method static Builder|PorcentajeIVA newModelQuery()
 * @method static Builder|PorcentajeIVA newQuery()
 * @method static Builder|PorcentajeIVA query()
 * @method static Builder|PorcentajeIVA sortable($defaultParameters = null)
 * @method static Builder|PorcentajeIVA whereActivo($value)
 * @method static Builder|PorcentajeIVA whereCreatedAt($value)
 * @method static Builder|PorcentajeIVA whereId($value)
 * @method static Builder|PorcentajeIVA wherePorcentaje($value)
 * @method static Builder|PorcentajeIVA whereUpdatedAt($value)
 * @method static Builder|PorcentajeIVA whereUpdatedBy($value)
 * @mixin Eloquent
 */
class PorcentajeIVA extends Model
{
    use HasFactory;
    use Authenticatable, CanResetPassword, Sortable;

    protected $table='porcentajes_iva';

    public $sortable = [
        'id',
        'porcentaje',
        'activo',
        'created_at',
        'updated_at'
    ];
}
