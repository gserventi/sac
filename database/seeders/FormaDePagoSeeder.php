<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FormaDePagoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('formas_de_pago')->insert([
            ['nombre'=>'Cheque','activo_ventas'=>true,'activo_compras'=>true, 'es_cheque'=>true, 'updated_by'=>1],
            ['nombre'=>'E-Cheq','activo_ventas'=>true,'activo_compras'=>true, 'es_cheque'=>true, 'updated_by'=>1],
            ['nombre'=>'Transferencia','activo_ventas'=>true,'activo_compras'=>true, 'es_cheque'=>false, 'updated_by'=>1],
            ['nombre'=>'Efectivo','activo_ventas'=>true,'activo_compras'=>true, 'es_cheque'=>false, 'updated_by'=>1],
            ['nombre'=>'Tarjeta de Credito BBVA','activo_ventas'=>false,'activo_compras'=>true, 'es_cheque'=>false, 'updated_by'=>1],
            ['nombre'=>'IIBB CABA','activo_ventas'=>true,'activo_compras'=>true, 'es_cheque'=>false, 'updated_by'=>1],
            ['nombre'=>'IIBB Bs.As.','activo_ventas'=>true,'activo_compras'=>true, 'es_cheque'=>false, 'updated_by'=>1],
            ['nombre'=>'IIBB Santa Fe','activo_ventas'=>true,'activo_compras'=>true, 'es_cheque'=>false, 'updated_by'=>1],
            ['nombre'=>'SUSS','activo_ventas'=>true,'activo_compras'=>true, 'es_cheque'=>false, 'updated_by'=>1],
            ['nombre'=>'Ganancias','activo_ventas'=>true,'activo_compras'=>true, 'es_cheque'=>false, 'updated_by'=>1]
        ]);
    }
}
