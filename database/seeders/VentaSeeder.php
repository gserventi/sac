<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VentaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ventas')->insert([
            ['id_periodo'=>1,
            'fecha_comprobante'=>date('2022-04-14'),
            'id_punto_de_venta'=>1,
            'numero_comprobante'=>'FCE A 00001-00000025',
            'id_cliente'=>1,
            'gravado'=>1000,
            'iva_21'=>210,
            'total'=>1210,
            'cobrada'=>true,
            'updated_by'=>1],

            ['id_periodo'=>1,
            'fecha_comprobante'=>date('2022-04-15'),
            'id_punto_de_venta'=>1,
            'numero_comprobante'=>'FCE A 00001-00000026',
            'id_cliente'=>1,
            'gravado'=>2000,
            'iva_21'=>420,
            'total'=>2420,
            'cobrada'=>false,
            'updated_by'=>1],

            ['id_periodo'=>2,
            'fecha_comprobante'=>date('2022-05-20'),
            'id_punto_de_venta'=>1,
            'numero_comprobante'=>'FCE A 00001-00000027',
            'id_cliente'=>1,
            'gravado'=>1000,
            'iva_21'=>210,
            'total'=>1210,
            'cobrada'=>false,
            'updated_by'=>1]
        ]);
    }
}
