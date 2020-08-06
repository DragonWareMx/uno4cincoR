<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSellsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sells', function (Blueprint $table) {
            $table->id();
            $table->string('nombreCliente',191);
            $table->enum('status', ['pendiente', 'completado','terminado']);
            $table->string('edad',2)->nullable();
            $table->string('pais',100);
            $table->enum('genero',['Hombre','Mujer','Otros'])->nullable();
            $table->string('ciudad',100);
            $table->string('estado',100);
            $table->string('correo',191);
            $table->string('telefono',15);
            $table->enum('formaPago',['1','2']);
            $table->tinyInteger('comprobantePago')->nullable();
            $table->string('direccion',191)->nullable();
            $table->date('fecha');
            $table->float('precio_envio')->nullable();
            $table->string('nombre_envio')->nullable();
            $table->unsignedBigInteger('promotion_id')->nullable();
            $table->foreign('promotion_id')
                ->references('id')
                ->on('promotions')
                ->onDelete('cascade');
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
        Schema::dropIfExists('sells');
    }
}
