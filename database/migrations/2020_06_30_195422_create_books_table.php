<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('isbn',30)->unique()->nullable();
            $table->text('titulo');
            $table->string('numEdicion',3);
            $table->float('precioFisico');
            $table->float('precioDigital');
            $table->float('descuentoFisico');
            $table->float('descuentoDigital');
            $table->text('sinopsis');
            $table->integer('stockFisico');
            $table->tinyInteger('stockDigital');
            $table->text('linkDescarga');
            $table->text('bannerImagen');
            $table->text('tiendaImagen');
            $table->boolean('nuevo')->default(0);
            $table->date('fechaPublicacion');
            $table->integer('ventas')->default(0);
            $table->unsignedBigInteger('sello_id');
            $table->foreign('sello_id')
                ->references('id')
                ->on('sellos')
                ->onDelete('cascade');
            $table->unsignedBigInteger('collection_id')->nullable();
            $table->foreign('collection_id')
                ->references('id')
                ->on('collections')
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
        Schema::dropIfExists('books');
    }
}
