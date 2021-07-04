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
<<<<<<< HEAD
            $table->bigIncrements('id');
            $table->bigInteger('id_pegawai')->unsigned();
            $table->bigInteger('id_pesanan')->unsigned();
            $table->date('tgl_transaksi');
            $table->string('nama_pelanggan');
=======
            $table->string('kd_transaksi')->unique()->primary();
            $table->bigInteger('pegawai_id')->unsigned();
            $table->bigInteger('pesanan_id')->unsigned();
>>>>>>> c0874bd1bc87e5fc5d86e6a715860d2478d8a657
            $table->integer('total_bayar');
            $table->integer('nama_pelanggan');
            $table->timestamps();

<<<<<<< HEAD
            $table->foreign('id_pegawai')->references('id')->on('pegawai');
=======
            $table->foreign('pesanan_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade')
            ->onUpdate('cascade');
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
        Schema::dropIfExists('transaksi');
    }
}
