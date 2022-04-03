<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Rubro extends Model
{
    use HasFactory;
    use Authenticatable, CanResetPassword, Sortable;

    protected $table='rubros';

    public function rubros() {
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
