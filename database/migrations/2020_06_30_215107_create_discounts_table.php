<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiscountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discounts', function (Blueprint $table) {
            $table->unsignedBigInteger('promotion_id')->unique();
            $table->primary('promotion_id');
            $table->foreign('promotion_id')
                ->references('id')
                ->on('promotions')
                ->onDelete('cascade');
            $table->float('descuento');
            $table->enum('tipo',['compra','envio','total']);
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
        Schema::dropIfExists('discounts');
    }
}
