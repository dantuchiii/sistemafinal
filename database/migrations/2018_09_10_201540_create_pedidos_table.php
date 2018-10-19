<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('estado');
            $table->integer('cantidad')->nullable();
            $table->decimal('total')->nullable();
            $table->date('fecha')->nullable();
            $table->text('descripcion')->nullable();
            
            
            $table->integer('usuario_id')->unsigned();
            $table->foreign('usuario_id')->references('id')->on('users');
            
           /* $table->integer('pedido_det_id')->unsigned();
            
            $table->foreign('pedido_det_id')->references('id')->on('pedido_dets');*/
            
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
        Schema::dropIfExists('pedidos');
    }
}
