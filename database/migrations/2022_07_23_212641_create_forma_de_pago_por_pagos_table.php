<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormaDePagoPorPagosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formas_de_pago_por_pago', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_pago')
                ->constrained('pagos')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('id_forma_de_pago')
                ->constrained('formas_de_pago')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->float('importe')->default(0);
            $table->dateTime('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->dateTime('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
            $table->integer('updated_by');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('forma_de_pago_por_pagos');
    }
}
