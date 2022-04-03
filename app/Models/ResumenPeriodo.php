<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResumenPeriodo extends Model
{
    use HasFactory;

    protected $table='resumen_periodos';

    public function periodo() {
        return $this->belongsTo(Periodo::class, 'id_periodo');
    }
}
