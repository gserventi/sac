<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PagoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pagos')->insert([
            'fecha_pago'=>date('2022-04-11'),
            'id_proveedor'=>1,
            'id_forma_de_pago'=>5,
            'total'=>9122.09,
            'updated_by'=>1
        ]);
    }
}
