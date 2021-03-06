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
            $table->bigInteger('pesanan_id')->unsigned();
            $table->bigInteger('menu_id')->unsigned();
            $table->integer('jumlah');
            $table->timestamps();

            $table->foreign('pesanan_id')
            ->references('id')
            ->on('pesanan')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('menu_id')
            ->references('id')
            ->on('menu')
            ->onDelete('cascade')
            ->onUpdate('cascade');
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
