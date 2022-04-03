<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateItemsPagoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items_pago', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_pago')
                ->constrained('pagos')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('id_compra')
                ->constrained('compras')
                ->onUpdate('cascade')
                ->onDelete('cascade');
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
        Schema::dropIfExists('item_pagos');
    }
}
