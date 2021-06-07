<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesananTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesanan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_koki')->unsigned();
            $table->bigInteger('id_pelanggan')->unsigned();
            $table->bigInteger('id_pelayan')->unsigned();
            $table->bigInteger('id_menu')->unsigned();
            $table->bigInteger('no_meja')->unsigned();
            $table->integer('total_harga');
            $table->timestamps();

            $table->foreign('id_koki')->references('id')->on('koki');
            $table->foreign('id_pelanggan')->references('id')->on('pelanggan');
            $table->foreign('id_pelayan')->references('id')->on('pelayan');
            $table->foreign('id_menu')->references('id')->on('menu');
            $table->foreign('no_meja')->references('no_meja')->on('meja');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pesanan');
    }
}
