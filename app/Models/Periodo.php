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
 * App\Models\Periodo
 *
 * @property int $id
 * @property int $mes
 * @property int $anio
 * @property string $nombre
 * @property int $cerrado
 * @property string|null $fecha_cierre
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property int $updated_by
 * @method static Builder|Periodo newModelQuery()
 * @method static Builder|Periodo newQuery()
 * @method static Builder|Periodo query()
 * @method static Builder|Periodo sortable($defaultParameters = null)
 * @method static Builder|Periodo whereAnio($value)
 * @method static Builder|Periodo whereCerrado($value)
 * @method static Builder|Periodo whereCreatedAt($value)
 * @method static Builder|Periodo whereFechaCierre($value)
 * @method static Builder|Periodo whereId($value)
 * @method static Builder|Periodo whereMes($value)
 * @method static Builder|Periodo whereNombre($value)
 * @method static Builder|Periodo whereUpdatedAt($value)
 * @method static Builder|Periodo whereUpdatedBy($value)
 * @mixin Eloquent
 */
class Periodo extends Model
{
    use HasFactory;
    use Authenticatable, CanResetPassword, Sortable;

    protected $table='periodos';

    public $sortable = [
        'id',
        'nombre',
        'cerrado',
        'fecha_cierre',
        'created_at',
        'updated_at'
    ];
}
