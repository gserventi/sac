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
            ['nombre'=>'Resumen', 'iva_compras'=>true, 'activo'=>true],
            ['nombre'=>'Extracto', 'iva_compras'=>true, 'activo'=>true],
            ['nombre'=>'Factura A', 'iva_compras'=>true, 'activo'=>true],
            ['nombre'=>'Factura C', 'iva_compras'=>true, 'activo'=>true],
            ['nombre'=>'Otro', 'iva_compras'=>false, 'activo'=>true],
        ]);
    }
}
