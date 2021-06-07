<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailCatatanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_catatan', function (Blueprint $table) {
            $table->bigInteger('id_catatan')->unsigned();
            $table->bigInteger('id_pesanan')->unsigned();
            $table->timestamps();

            $table->foreign('id_catatan')->references('id')->on('catatan');
            $table->foreign('id_pesanan')->references('id')->on('pesanan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_catatan');
    }
}
