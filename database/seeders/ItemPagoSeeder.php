<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemPagoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('items_pago')->insert([
            'id_pago'=>1,
            'id_compra'=>1,
            'updated_by'=>1
        ]);
    }
}
