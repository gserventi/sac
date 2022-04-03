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
        ['nombre'=>'Gomeria','activo'=>true],
        ['nombre'=>'Telepeajes','activo'=>true],
        ['nombre'=>'Ruta','activo'=>true],
        ['nombre'=>'Satelital','activo'=>true],
        ['nombre'=>'VTV','activo'=>true],
        ['nombre'=>'Neumaticos','activo'=>true],
        ['nombre'=>'Combustible','activo'=>true],
        ['nombre'=>'Mantenimiento','activo'=>true],
        ['nombre'=>'Reparaciones','activo'=>true],
        ['nombre'=>'Reintegro Reparacion','activo'=>true],
        ['nombre'=>'Seguros','activo'=>true],
        ['nombre'=>'Segurizacion','activo'=>true],
        ['nombre'=>'Repuestos','activo'=>true],
        ['nombre'=>'Lonero','activo'=>true],
        ['nombre'=>'Insumos','activo'=>true],
        ['nombre'=>'Reintegro Telefonia','activo'=>true],
        ['nombre'=>'Telefonia','activo'=>true],
        ['nombre'=>'Escribania','activo'=>true],
        ['nombre'=>'Honorarios','activo'=>true],
        ['nombre'=>'Alquileres','activo'=>true],
        ['nombre'=>'Alquiler DOZ','activo'=>true],
        ['nombre'=>'Gastos Bancarios','activo'=>true],
        ['nombre'=>'Varios','activo'=>true]
        ]);
    }
}
