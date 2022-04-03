<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_periodo')
                ->constrained('periodos')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->date('fecha_comprobante');
            $table->foreignId('id_punto_de_venta')
                ->constrained('puntos_de_venta');
            $table->string('numero_comprobante',45);
            $table->foreignId('id_cliente')
                ->constrained('clientes')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->float('no_gravado')->nullable()->default(0);
            $table->float('gravado')->nullable()->default(0);
            $table->float('iva_21')->default(0);
            $table->float('total')->default(0);
            $table->boolean('cobrada')->default(false);
            $table->dateTime('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->dateTime('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ventas');
    }
}
