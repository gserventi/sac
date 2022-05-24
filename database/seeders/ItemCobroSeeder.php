<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemCobroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('items_cobros')->insert([
            'id_cobro'=>1,
            'id_venta'=>1,
            'updated_by'=>1
        ]);
    }
}
