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
            ['nombre'=>'Enero 2022','mes'=>1,'anio'=>2022,'cerrado'=>false, 'updated_by'=>1],
            ['nombre'=>'Febrero 2022','mes'=>2,'anio'=>2022,'cerrado'=>false, 'updated_by'=>1]
       ]);
    }
}
