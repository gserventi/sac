<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CobroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cobros')->insert([
            'fecha_cobro'=>date('2022-01-20'),
            'id_cliente'=>1,
            'id_forma_de_pago'=>1,
            'total'=>1210
        ]);
    }
}
