<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PeriodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('periodos')->insert([
            ['nombre'=>'Abril 2022','mes'=>4,'anio'=>2022,'cerrado'=>false, 'updated_by'=>1],
            ['nombre'=>'Mayo 2022','mes'=>5,'anio'=>2022,'cerrado'=>false, 'updated_by'=>1]
       ]);
    }
}
