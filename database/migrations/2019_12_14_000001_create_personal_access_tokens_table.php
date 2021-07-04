<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

<<<<<<< HEAD:database/migrations/2021_06_27_074311_create_pegawai.php
class CreatePegawai extends Migration
=======
class CreatePersonalAccessTokensTable extends Migration
>>>>>>> c0874bd1bc87e5fc5d86e6a715860d2478d8a657:database/migrations/2019_12_14_000001_create_personal_access_tokens_table.php
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
<<<<<<< HEAD:database/migrations/2021_06_27_074311_create_pegawai.php
        Schema::create('pegawai', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('alamat');
            $table->string('no_hp');
            $table->string('jk');
            $table->string('username');
            $table->string('password');
            $table->string('roles');
=======
        Schema::create('personal_access_tokens', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->morphs('tokenable');
            $table->string('name');
            $table->string('token', 64)->unique();
            $table->text('abilities')->nullable();
            $table->timestamp('last_used_at')->nullable();
>>>>>>> c0874bd1bc87e5fc5d86e6a715860d2478d8a657:database/migrations/2019_12_14_000001_create_personal_access_tokens_table.php
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
<<<<<<< HEAD:database/migrations/2021_06_27_074311_create_pegawai.php
        Schema::dropIfExists('pegawai');
=======
        Schema::dropIfExists('personal_access_tokens');
>>>>>>> c0874bd1bc87e5fc5d86e6a715860d2478d8a657:database/migrations/2019_12_14_000001_create_personal_access_tokens_table.php
    }
}
