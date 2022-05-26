<?php

namespace App\Models;

use Eloquent;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Kyslik\ColumnSortable\Sortable;

/**
 * App\Models\Rubro
 *
 * @property int $id
 * @property string $nombre
 * @property int $activo
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property int $updated_by
 * @property-read Collection|Proveedor[] $rubros
 * @property-read int|null $rubros_count
 * @method static Builder|Rubro newModelQuery()
 * @method static Builder|Rubro newQuery()
 * @method static Builder|Rubro query()
 * @method static Builder|Rubro sortable($defaultParameters = null)
 * @method static Builder|Rubro whereActivo($value)
 * @method static Builder|Rubro whereCreatedAt($value)
 * @method static Builder|Rubro whereId($value)
 * @method static Builder|Rubro whereNombre($value)
 * @method static Builder|Rubro whereUpdatedAt($value)
 * @method static Builder|Rubro whereUpdatedBy($value)
 * @mixin Eloquent
 */
class Rubro extends Model
{
    use HasFactory;
    use Authenticatable, CanResetPassword, Sortable;

    protected $table='rubros';

    public function rubros(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Proveedor::class, 'id_rubro');
    }

    public $sortable = [
        'id',
        'nombre',
        'activo',
        'created_at',
        'updated_at'
    ];
}
