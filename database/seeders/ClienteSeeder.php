<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clientes')->insert([
            'nombre'=>'CLCL',
            'cuit'=>'11223334445',
            'dias_cobro'=>10,
            'email'=>'email@algo.com',
            'telefono'=>'1234-5678',
            'observaciones'=>'alguna observacion',
            'activo'=>true
        ]);
    }
}
