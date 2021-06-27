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
            $table->bigInteger('id_pegawai')->unsigned();
            $table->bigInteger('no_meja')->unsigned();
            $table->string('status');
            $table->timestamps();

            $table->foreign('id_pegawai')->references('id')->on('pegawai');
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
