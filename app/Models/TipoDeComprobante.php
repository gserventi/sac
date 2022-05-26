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
 * App\Models\TipoDeComprobante
 *
 * @property int $id
 * @property string $nombre
 * @property int $iva_compras
 * @property int $activo
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property int $updated_by
 * @method static Builder|TipoDeComprobante newModelQuery()
 * @method static Builder|TipoDeComprobante newQuery()
 * @method static Builder|TipoDeComprobante query()
 * @method static Builder|TipoDeComprobante sortable($defaultParameters = null)
 * @method static Builder|TipoDeComprobante whereActivo($value)
 * @method static Builder|TipoDeComprobante whereCreatedAt($value)
 * @method static Builder|TipoDeComprobante whereId($value)
 * @method static Builder|TipoDeComprobante whereIvaCompras($value)
 * @method static Builder|TipoDeComprobante whereNombre($value)
 * @method static Builder|TipoDeComprobante whereUpdatedAt($value)
 * @method static Builder|TipoDeComprobante whereUpdatedBy($value)
 * @mixin Eloquent
 */
class TipoDeComprobante extends Model
{
    use HasFactory;
    use Authenticatable, CanResetPassword, Sortable;

    protected $table='tipos_de_comprobantes';

    public $sortable = [
        'id',
        'nombre',
        'iva_compras',
        'activo',
        'created_at',
        'updated_at'
    ];
}
