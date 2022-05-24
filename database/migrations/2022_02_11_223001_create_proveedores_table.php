<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateProveedoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proveedores', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',200);
            $table->string('cuit',11);
            $table->string('email',100)->nullable();
            $table->string('telefono',100)->nullable();
            $table->foreignId('id_rubro')->nullable()
                ->constrained('rubros')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->integer('dias_pago')->nullable();
            $table->foreignId('id_porcentaje_iva')
                ->constrained('porcentajes_iva')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('id_forma_de_pago_default')->nullable()
                ->constrained('formas_de_pago')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('id_tipo_comprobante')
                ->constrained('tipos_de_comprobantes')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('observaciones',255)->nullable();
            $table->boolean('activo')->default(true);
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
        Schema::dropIfExists('proveedors');
    }
}
