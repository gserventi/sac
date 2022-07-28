<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FormaDePagoPorPagoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('formas_de_pago_por_pago')->insert([
            'id_pago'=>1,
            'id_forma_de_pago'=>4,
            'importe'=>9122.09,
            'updated_by'=>1
        ]);
    }
}
