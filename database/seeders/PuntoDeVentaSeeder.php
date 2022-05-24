<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PuntoDeVentaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('puntos_de_venta')->insert([
            ['nombre'=>'FCE A',
            'prefijo'=>'00001',
            'ultimo_numero'=>'00000027',
            'activo'=>true,
            'updated_by'=>1],
            ['nombre'=>'FC A',
            'prefijo'=>'00001',
            'ultimo_numero'=>'00000501',
            'activo'=>true,
            'updated_by'=>1],
        ]);
    }
}
