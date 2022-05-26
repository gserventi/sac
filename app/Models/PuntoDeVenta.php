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
 * App\Models\PuntoDeVenta
 *
 * @property int $id
 * @property string $nombre
 * @property string $prefijo
 * @property string $ultimo_numero
 * @property int $activo
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property int $updated_by
 * @method static Builder|PuntoDeVenta newModelQuery()
 * @method static Builder|PuntoDeVenta newQuery()
 * @method static Builder|PuntoDeVenta query()
 * @method static Builder|PuntoDeVenta sortable($defaultParameters = null)
 * @method static Builder|PuntoDeVenta whereActivo($value)
 * @method static Builder|PuntoDeVenta whereCreatedAt($value)
 * @method static Builder|PuntoDeVenta whereId($value)
 * @method static Builder|PuntoDeVenta whereNombre($value)
 * @method static Builder|PuntoDeVenta wherePrefijo($value)
 * @method static Builder|PuntoDeVenta whereUltimoNumero($value)
 * @method static Builder|PuntoDeVenta whereUpdatedAt($value)
 * @method static Builder|PuntoDeVenta whereUpdatedBy($value)
 * @mixin Eloquent
 */
class PuntoDeVenta extends Model
{
    use HasFactory;
    use Authenticatable, CanResetPassword, Sortable;

    protected $table='puntos_de_venta';

    public $sortable = [
        'id',
        'nombre',
        'prefijo',
        'ultimo_numero',
        'activo',
        'created_at',
        'updated_at'
    ];
}
