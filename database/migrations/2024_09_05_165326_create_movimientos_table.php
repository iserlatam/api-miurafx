<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('movimientos', function (Blueprint $table) {
            $table->id();
            $table->string('radicado');
            $table->string('tipo_solicitud');
            $table->string('estado_solicitud');
            $table->string('metodo_pago');
            $table->date('fecha_solicitud');
            $table->string('divisa');
            $table->string('cod_banco_red');
            $table->string('no_cuenta_billetera');
            $table->string('cantidad');
            $table->string('razon_rechazo');
            $table->string('documento');
            $table->foreignId('cliente_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movimientos');
    }
};
