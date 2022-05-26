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
 * App\Models\FormaDePago
 *
 * @property int $id
 * @property string $nombre
 * @property int $activo_ventas
 * @property int $activo_compras
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property int $updated_by
 * @method static Builder|FormaDePago newModelQuery()
 * @method static Builder|FormaDePago newQuery()
 * @method static Builder|FormaDePago query()
 * @method static Builder|FormaDePago sortable($defaultParameters = null)
 * @method static Builder|FormaDePago whereActivoCompras($value)
 * @method static Builder|FormaDePago whereActivoVentas($value)
 * @method static Builder|FormaDePago whereCreatedAt($value)
 * @method static Builder|FormaDePago whereId($value)
 * @method static Builder|FormaDePago whereNombre($value)
 * @method static Builder|FormaDePago whereUpdatedAt($value)
 * @method static Builder|FormaDePago whereUpdatedBy($value)
 * @mixin Eloquent
 */
class FormaDePago extends Model
{
    use HasFactory;
    use Authenticatable, CanResetPassword, Sortable;

    protected $table='formas_de_pago';

    public $sortable = [
        'id',
        'nombre',
        'activo_ventas',
        'activo_compras',
        'created_at',
        'updated_at'
    ];
}
