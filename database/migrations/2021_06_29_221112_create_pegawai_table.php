<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePegawaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pegawai', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->text('alamat');
            $table->string('no_telp');            
            $table->enum('jk', ['L', 'P']);
            $table->timestamps();

            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });

        Schema::table('transaksi', function (Blueprint $table) {
            $table->foreign('pegawai_id')
            ->references('id')
            ->on('pegawai')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });

        Schema::table('pesanan', function (Blueprint $table) {
            $table->foreign('pegawai_id')
            ->references('id')
            ->on('pegawai')
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
        Schema::table('pesanan', function (Blueprint $table) {
            $table->dropForeign('pesanan_pegawai_id_foreign');
        });
        Schema::table('transaksi', function (Blueprint $table) {
            $table->dropForeign('transaksi_pegawai_id_foreign');
        });
        Schema::dropIfExists('pegawai');
    }
}
