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
            $table->id();
            $table->bigInteger('no_meja')->unsigned();
            $table->bigInteger('pegawai_id')->unsigned();
            $table->integer('no_antrian');
            $table->enum('status', ['menunggu', 'diproses', 'selesai', 'habis']);
            $table->timestamps();

            $table->foreign('no_meja')
            ->references('no_meja')
            ->on('meja')
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
        Schema::dropIfExists('pesanan');
    }
}
