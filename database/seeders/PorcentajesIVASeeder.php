<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PorcentajesIVASeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('porcentajes_iva')->insert([
            ['porcentaje'=>21, 'activo'=>true],
            ['porcentaje'=>27, 'activo'=>true],
            ['porcentaje'=>10.5, 'activo'=>true]
        ]);
    }
}
