<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGurusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gurus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('nip')->unsigned();
            $table->string('nama_depan');
            $table->string('nama_belakang');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('token')->nullable();
            $table->string('avatar')->nullable();
            $table->rememberToken();
            $table->date('tgl_lahir')->nullable();
            $table->text('desc')->nullable();
            $table->unsignedBigInteger('gender');
            $table->unsignedBigInteger('agama')->nullable();
            $table->unsignedBigInteger('tingkat_pendidikan')->nullable();
            $table->unsignedBigInteger('gelar')->nullable();
            $table->unsignedBigInteger('jabatan')->nullable();
            $table->unsignedBigInteger('wali_kelas')->nullable();
            $table->foreign('gender')->references('id')->on('genders');
            $table->foreign('agama')->references('id')->on('agamas');
            $table->foreign('tingkat_pendidikan')->references('id')->on('tingkat_pendidikans');
            $table->foreign('gelar')->references('id')->on('gelars');
            $table->foreign('jabatan')->references('id')->on('jabatans');
            $table->foreign('wali_kelas')->references('id')->on('kelas');
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
        Schema::dropIfExists('gurus');
    }
}
