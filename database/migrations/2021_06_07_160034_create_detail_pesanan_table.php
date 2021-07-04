<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailPesananTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_pesanan', function (Blueprint $table) {
            $table->bigIncrements('id');
<<<<<<< HEAD
            $table->bigInteger('id_pesanan')->unsigned();
            $table->bigInteger('id_menu')->unsigned();
            $table->integer('jumlah');
            $table->timestamps();

            $table->foreign('id_pesanan')->references('id')->on('pesanan');
            $table->foreign('id_menu')->references('id')->on('menu');
=======
            $table->bigInteger('pesanan_id')->unsigned();
            $table->bigInteger('menu_id')->unsigned();
            $table->integer('jumlah');
            $table->timestamps();

            $table->foreign('pesanan_id')->references('id')->on('pesanan');
            $table->foreign('menu_id')->references('id')->on('menu');
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
        Schema::dropIfExists('detail_pesanan');
    }
}
