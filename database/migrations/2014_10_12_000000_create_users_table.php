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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password'); // clave

            // Datos personales
            $table->string('nombre_completo')->nullable();
            $table->string('dirección')->nullable();
            $table->string('celular')->nullable();
            $table->date('fecha_nacimiento')->nullable();
            $table->integer('estado')->nullable();
            $table->string('etiqueta')->nullable();
            $table->string('ciudad')->nullable();
            $table->string('tipo_documento')->nullable();
            $table->string('documento')->nullable();
            $table->string('método_pago')->nullable();
            $table->string('pais')->nullable();

            $table->rememberToken();
            $table->timestamps(); // Fecha de creación
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
