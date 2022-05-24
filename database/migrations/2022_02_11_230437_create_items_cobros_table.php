<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateItemsCobrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items_cobros', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_cobro')
                ->constrained('cobros')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('id_venta')
                ->constrained('ventas')
                ->onUpdate('cascade')
                ->onDelete('cascade');
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
        Schema::dropIfExists('item_cobros');
    }
}
