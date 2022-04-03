<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateCobrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cobros', function (Blueprint $table) {
            $table->id();
            $table->dateTime('fecha_cobro');
            $table->foreignId('id_cliente')
                ->constrained('clientes')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('id_forma_de_pago')
                ->constrained('formas_de_pago')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->float('total');
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
        Schema::dropIfExists('cobros');
    }
}
