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
<<<<<<< HEAD
            $table->bigIncrements('id');
            $table->bigInteger('id_pegawai')->unsigned();
            $table->bigInteger('no_meja')->unsigned();
            $table->string('status');
            $table->timestamps();

            $table->foreign('id_pegawai')->references('id')->on('pegawai');
            $table->foreign('no_meja')->references('no_meja')->on('meja');
=======
            $table->id();
            $table->bigInteger('no_meja')->unsigned();
            $table->bigInteger('pegawai_id')->unsigned();
            $table->integer('no_antrian');
            $table->enum('status', ['foo', 'bar']);
            $table->timestamps();

            $table->foreign('no_meja')
            ->references('no_meja')
            ->on('meja')
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
        Schema::dropIfExists('pesanan');
    }
}
