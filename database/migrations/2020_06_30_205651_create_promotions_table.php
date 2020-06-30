<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromotionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promotions', function (Blueprint $table) {
            $table->id();
            $table->string('codigo',45)->unique();
            $table->date('limiteFecha')->nullable();
            $table->integer('numUsos')->nullable();
            $table->integer('limiteCompra')->nullable();
            $table->tinyInteger('reusable')->nullable();
            $table->tinyInteger('nuevos')->nullable();
            $table->tinyInteger('downloads')->nullable();
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
        Schema::dropIfExists('promotions');
    }
}
