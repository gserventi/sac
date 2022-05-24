<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProveedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('proveedores')->insert(
            [
                'nombre'=>'Autopistas de Buenos Aires SA',
                'cuit'=>'30714112836',
                'id_rubro'=>2,
                'id_porcentaje_iva'=>1,
                'id_forma_de_pago_default'=>5,
                'id_tipo_comprobante'=>3,
                'activo'=>true,
                'updated_by'=>1
            ],
        );
    }
}
