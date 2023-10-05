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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->bigIncrements('id');
            $table->string('user_name')->unique();
            $table->string('user_nombre');
            $table->string('user_correo')->unique();
            $table->string('user_telefono')->nullable();
            $table->string('password');
            $table->string('fecha_registro');

            $table->unsignedBigInteger('rol_id')->default('1')->nullable();
            $table->foreign('rol_id')
                ->references('id')
                ->on('roles')
                ->onUpdate('cascade')
                ->onDelete('set null');

            $table->unsignedBigInteger('sucursal_id')->default('1')->nullable();
            $table->foreign('sucursal_id')
                ->references('id')
                ->on('sucursales')
                ->onUpdate('cascade')
                ->onDelete('set null');


            $table->boolean('user_estado')->default(1);

            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
