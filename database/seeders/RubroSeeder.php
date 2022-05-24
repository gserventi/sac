<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RubroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rubros')->insert([
        ['nombre'=>'Gomeria','activo'=>true,'updated_by'=>1],
        ['nombre'=>'Telepeajes','activo'=>true,'updated_by'=>1],
        ['nombre'=>'Ruta','activo'=>true,'updated_by'=>1],
        ['nombre'=>'Satelital','activo'=>true,'updated_by'=>1],
        ['nombre'=>'VTV','activo'=>true,'updated_by'=>1],
        ['nombre'=>'Neumaticos','activo'=>true,'updated_by'=>1],
        ['nombre'=>'Combustible','activo'=>true,'updated_by'=>1],
        ['nombre'=>'Mantenimiento','activo'=>true,'updated_by'=>1],
        ['nombre'=>'Reparaciones','activo'=>true,'updated_by'=>1],
        ['nombre'=>'Reintegro Reparacion','activo'=>true,'updated_by'=>1],
        ['nombre'=>'Seguros','activo'=>true,'updated_by'=>1],
        ['nombre'=>'Segurizacion','activo'=>true,'updated_by'=>1],
        ['nombre'=>'Repuestos','activo'=>true,'updated_by'=>1],
        ['nombre'=>'Lonero','activo'=>true,'updated_by'=>1],
        ['nombre'=>'Insumos','activo'=>true,'updated_by'=>1],
        ['nombre'=>'Reintegro Telefonia','activo'=>true,'updated_by'=>1],
        ['nombre'=>'Telefonia','activo'=>true,'updated_by'=>1],
        ['nombre'=>'Escribania','activo'=>true,'updated_by'=>1],
        ['nombre'=>'Honorarios','activo'=>true,'updated_by'=>1],
        ['nombre'=>'Alquileres','activo'=>true,'updated_by'=>1],
        ['nombre'=>'Alquiler DOZ','activo'=>true,'updated_by'=>1],
        ['nombre'=>'Gastos Bancarios','activo'=>true,'updated_by'=>1],
        ['nombre'=>'Varios','activo'=>true,'updated_by'=>1]
        ]);
    }
}
