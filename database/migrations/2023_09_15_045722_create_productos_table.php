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
     
        // Migración para la tabla Categoria
        Schema::create('categorias', function (Blueprint $table) {
            $table->id('id_categoria');
            $table->string('nombre');
            $table->unsignedBigInteger('user_cambio');
            $table->foreign('user_cambio')->references('id')->on('users');
            $table->integer('baja');
            $table->timestamps();
        });

        // Migración para la tabla Proveedor
        Schema::create('proveedores', function (Blueprint $table) {
            $table->id('id_proveedor');
            $table->string('nombre');
            $table->unsignedBigInteger('id_categoria');
            $table->foreign('id_categoria')->references('id_categoria')->on('categorias');
            $table->unsignedBigInteger('user_cambio');
            $table->foreign('user_cambio')->references('id')->on('users');
            $table->integer('baja');
            $table->timestamps();
        });

        // Migración para la tabla Venta
        Schema::create('ventas', function (Blueprint $table) {
            $table->id('id_venta');
            $table->float('total');
            $table->integer('metodo_pago');
            $table->integer('pagado');
            $table->date('fecha');
            $table->unsignedBigInteger('id_usuario');
            $table->foreign('id_usuario')->references('id')->on('users'); 
            $table->timestamps();
        });

        // Migración para la tabla Producto
        Schema::create('productos', function (Blueprint $table) {
            $table->id('id_producto');
            $table->string('nombre');
            $table->float('stock');
            $table->float('precio');
            $table->integer('alerta');
            $table->unsignedBigInteger('id_proveedor');
            $table->foreign('id_proveedor')->references('id_proveedor')->on('proveedores');
            $table->unsignedBigInteger('user_cambio');
            $table->foreign('user_cambio')->references('id')->on('users');
            $table->integer('baja');
            $table->timestamps();
        });

        // Migración para la tabla Detalle
        Schema::create('detalles', function (Blueprint $table) {
            $table->float('precio');
            $table->integer('cantidad');
            $table->unsignedBigInteger('id_venta');
            $table->foreign('id_venta')->references('id_venta')->on('ventas');
            $table->unsignedBigInteger('id_producto');
            $table->foreign('id_producto')->references('id_producto')->on('productos');
            $table->unsignedBigInteger('user_cambio');
            $table->foreign('user_cambio')->references('id')->on('users');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
        Schema::dropIfExists('detalles');
        Schema::dropIfExists('proveedores');
        Schema::dropIfExists('ventas');
        Schema::dropIfExists('categorias');

    }
};
