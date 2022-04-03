<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            RubroSeeder::class,
            PorcentajesIVASeeder::class,
            TiposDeComprobantesSeeder::class,
            FormaDePagoSeeder::class,
            ProveedorSeeder::class,
            PeriodoSeeder::class,
            CompraSeeder::class,
            PagoSeeder::class,
            ItemPagoSeeder::class,
            PuntoDeVentaSeeder::class,
            ClienteSeeder::class,
            VentaSeeder::class,
            CobroSeeder::class,
            ItemCobroSeeder::class,
            UserSeeder::class
        ]);
    }
}
