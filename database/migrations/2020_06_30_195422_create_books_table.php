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
            $table->string('isbn', 30)->unique()->nullable();
            $table->string('name', 150)->unique()->nullable();
            $table->text('titulo');
            $table->string('numEdicion', 3);
            $table->float('precioFisico');
            $table->float('costoEnvio');
            $table->float('precioAudio')->nullable();
            $table->float('precioDigital');
            $table->float('descuentoFisico')->default(0);;
            $table->float('descuentoDigital')->default(0);;
            $table->float('descuentoAudio')->default(0);;
            $table->text('sinopsis');
            $table->integer('stockFisico');
            $table->tinyInteger('stockDigital');
            $table->tinyInteger('stockAudio')->default(0);
            $table->text('linkDescarga')->nullable();

            $table->text('linkDemo')->nullable();
            $table->text('linkDigital')->nullable();
            $table->text('linkAmazon')->nullable();
            $table->text('linkGoogle')->nullable();
            $table->text('linkAudio')->nullable();

            $table->text('portadaImagen')->default('');
            $table->text('bannerImagen')->default('');
            $table->text('tiendaImagen')->default('');
            $table->boolean('nuevo')->default(0);
            $table->date('fechaPublicacion');
            $table->integer('ventas')->default(0);
            $table->integer('paginas');
            $table->unsignedBigInteger('sello_id')->nullable();
            $table->foreign('sello_id')
                ->references('id')
                ->on('sellos')
                ->onDelete('cascade');
            $table->unsignedBigInteger('collection_id')->nullable();
            $table->foreign('collection_id')
                ->references('id')
                ->on('collections')
                ->onDelete('set null');
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
