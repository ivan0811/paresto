<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->string('kd_transaksi')->unique()->primary();
            $table->bigInteger('pegawai_id')->unsigned();
            $table->bigInteger('pesanan_id')->unsigned();
            $table->integer('total_bayar');            
            $table->timestamps();

            $table->foreign('pesanan_id')
            ->references('id')
            ->on('pesanan')
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
        Schema::dropIfExists('transaksi');
    }
}
