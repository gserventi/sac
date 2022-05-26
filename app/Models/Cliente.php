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
 * App\Models\Cliente
 *
 * @property int $id
 * @property string $nombre
 * @property string $cuit
 * @property int $dias_cobro
 * @property string|null $email
 * @property string|null $telefono
 * @property string|null $observaciones
 * @property int $activo
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property int $updated_by
 * @method static Builder|Cliente newModelQuery()
 * @method static Builder|Cliente newQuery()
 * @method static Builder|Cliente query()
 * @method static Builder|Cliente sortable($defaultParameters = null)
 * @method static Builder|Cliente whereActivo($value)
 * @method static Builder|Cliente whereCreatedAt($value)
 * @method static Builder|Cliente whereCuit($value)
 * @method static Builder|Cliente whereDiasCobro($value)
 * @method static Builder|Cliente whereEmail($value)
 * @method static Builder|Cliente whereId($value)
 * @method static Builder|Cliente whereNombre($value)
 * @method static Builder|Cliente whereObservaciones($value)
 * @method static Builder|Cliente whereTelefono($value)
 * @method static Builder|Cliente whereUpdatedAt($value)
 * @method static Builder|Cliente whereUpdatedBy($value)
 * @mixin Eloquent
 */
class Cliente extends Model
{
    use HasFactory;
    use Authenticatable, CanResetPassword, Sortable;

    protected $table='clientes';

    public $sortable = [
        'id',
        'nombre',
        'cuit',
        'email',
        'telefono',
        'dias_cobro',
        'observaciones',
        'activo',
        'created_at',
        'updated_at'
    ];

    /**
     * Devuelve el CUIT con formato de guiones
     *
     * @param $cuit
     * @return string
     */
    public function cuit_con_formato($cuit): string
    {
        return substr($cuit, 0,2) . '-' . substr($cuit,2,8) . '-' . substr($cuit, 10,2);
    }
}
