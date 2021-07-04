<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu', function (Blueprint $table) {
<<<<<<< HEAD
            $table->bigIncrements('id');
            $table->string('nama');
            $table->integer('harga');
            $table->string('status');
            $table->binary('gambar');
            $table->timestamps();
=======
            $table->id();
            $table->bigInteger('kategori_id')->unsigned();
            $table->string('nama');
            $table->string('gambar')->nullable()->default(null);
            $table->integer('harga');
            $table->enum('status', ['foo', 'bar']);
            $table->timestamps();

            $table->foreign('kategori_id')->references('id')->on('kategori_menu');
>>>>>>> c0874bd1bc87e5fc5d86e6a715860d2478d8a657
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menu');
    }
}
