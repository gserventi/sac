<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TiposDeComprobantesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipos_de_comprobantes')->insert([
            ['nombre'=>'Resumen', 'iva_compras'=>true, 'activo'=>true, 'updated_by'=>1],
            ['nombre'=>'Extracto', 'iva_compras'=>true, 'activo'=>true, 'updated_by'=>1],
            ['nombre'=>'Factura A', 'iva_compras'=>true, 'activo'=>true, 'updated_by'=>1],
            ['nombre'=>'Factura C', 'iva_compras'=>true, 'activo'=>true, 'updated_by'=>1],
            ['nombre'=>'Otro', 'iva_compras'=>false, 'activo'=>true, 'updated_by'=>1],
        ]);
    }
}
