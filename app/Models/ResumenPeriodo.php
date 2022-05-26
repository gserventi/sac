<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * App\Models\ResumenPeriodo
 *
 * @property int $id
 * @property int $id_periodo
 * @property float $total_iva_ventas
 * @property float $total_iva_compras
 * @property float $diferencia
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property int $updated_by
 * @property-read Periodo $periodo
 * @method static Builder|ResumenPeriodo newModelQuery()
 * @method static Builder|ResumenPeriodo newQuery()
 * @method static Builder|ResumenPeriodo query()
 * @method static Builder|ResumenPeriodo whereCreatedAt($value)
 * @method static Builder|ResumenPeriodo whereDiferencia($value)
 * @method static Builder|ResumenPeriodo whereId($value)
 * @method static Builder|ResumenPeriodo whereIdPeriodo($value)
 * @method static Builder|ResumenPeriodo whereTotalIvaCompras($value)
 * @method static Builder|ResumenPeriodo whereTotalIvaVentas($value)
 * @method static Builder|ResumenPeriodo whereUpdatedAt($value)
 * @method static Builder|ResumenPeriodo whereUpdatedBy($value)
 * @mixin Eloquent
 */
class ResumenPeriodo extends Model
{
    use HasFactory;

    protected $table='resumen_periodos';

    /**
     * Devuelve el periodo asociado a una linea de resumen
     *
     * @return BelongsTo
     */
    public function periodo(): BelongsTo
    {
        return $this->belongsTo(Periodo::class, 'id_periodo');
    }
}
