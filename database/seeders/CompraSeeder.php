<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('compras')->insert([
            ['id_periodo'=>1,
            'fecha_comprobante'=>date('2022-01-10'),
            'id_tipo_comprobante'=>3,
            'numero_comprobante'=>'0050-02384050',
            'id_proveedor'=>1,
            'gravado'=>7262.81,
            'iva_21'=>1525.19,
            'percepcion_iva_RG3337_3'=>217.89,
            'percepcion_iibb_caba_15'=>108.94,
            'percepcion_iibb_ba_01'=>7.26,
            'neto'=>9122.09,
            'pagada'=>true],

            ['id_periodo'=>1,
            'fecha_comprobante'=>'2022-01-12',
            'id_tipo_comprobante'=>3,
            'numero_comprobante'=>'0050-02384051',
            'id_proveedor'=>1,
            'gravado'=>3219.26,
            'iva_21'=>676.08,
            'percepcion_iva_RG3337_3'=>96.58,
            'percepcion_iibb_caba_15'=>48.29,
            'percepcion_iibb_ba_01'=>3.22,
            'neto'=>4043.43,
            'pagada'=>false],

            ['id_periodo'=>2,
            'fecha_comprobante'=>date('2022-02-20'),
            'id_tipo_comprobante'=>3,
            'numero_comprobante'=>'0050-02384052',
            'id_proveedor'=>1,
            'gravado'=>7262.81,
            'iva_21'=>1525.19,
            'percepcion_iva_RG3337_3'=>217.89,
            'percepcion_iibb_caba_15'=>108.94,
            'percepcion_iibb_ba_01'=>7.26,
            'neto'=>9122.09,
            'pagada'=>false]
        ]);
    }
}
