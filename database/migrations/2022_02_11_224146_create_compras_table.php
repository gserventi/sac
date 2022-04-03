<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateComprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compras', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_periodo')
                ->constrained('periodos')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->date('fecha_comprobante');
            $table->foreignId('id_tipo_comprobante')
                ->constrained('tipos_de_comprobantes')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('numero_comprobante');
            $table->foreignId('id_proveedor')
                ->constrained('proveedores')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->float('exento')->nullable()->default(0);
            $table->float('no_gravado')->nullable()->default(0);
            $table->float('gravado')->nullable()->default(0);
            $table->float('iva_21')->nullable()->default(0);
            $table->float('iva_27')->nullable()->default(0);
            $table->float('iva_105')->nullable()->default(0);
            $table->float('percepcion_iva_RG3337_3')->nullable()->default(0);
            $table->float('percepcion_iva_RG3337_105')->nullable()->default(0);
            $table->float('percepcion_iibb_caba_15')->nullable()->default(0);
            $table->float('percepcion_iibb_ba_01')->nullable()->default(0);
            $table->float('neto')->default(0);
            $table->boolean('pagada')->default(false);
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
        Schema::dropIfExists('compras');
    }
}
