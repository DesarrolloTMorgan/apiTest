<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_recibe');
            $table->string('calle');
            $table->string('numero');
            $table->string('colonia');
            $table->string('entre_calles');
            $table->string('referencia');
            $table->string('telefono');
            $table->string('lugar_pedido');
            $table->string('detalle_pedido');
            $table->string('estatus');
            $table->string('costo');
            $table->text('menasje_respuesta');
            $table->unsignedInteger('customer_id')->nullable();
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->unsignedInteger('repartidor_id')->nullable();
            $table->foreign('repartidor_id')->references('id')->on('repartidores');
            $table->unsignedInteger('store_id');
            $table->foreign('store_id')->references('id')->on('stores');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
