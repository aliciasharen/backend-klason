<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMuridsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('murids', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('nis')->unsigned();
            $table->string('nama_depan');
            $table->string('nama_belakang');
            $table->string('email')->unique();
            $table->string('token')->nullable();
            $table->string('password')->nullable();
            $table->string('avatar')->nullable();
            $table->integer('no_tlp')->unsigned();
            $table->text('alamat')->nullable();
            $table->date('tgl_lahir')->nullable();
            $table->string('nama_wali')->nullable();
            $table->integer('no_tlp_wali')->unsigned();
            $table->text('alamat_wali');
            $table->unsignedBigInteger('gender');
            $table->unsignedBigInteger('kelas');
            $table->unsignedBigInteger('jurusan');
            $table->unsignedBigInteger('pengurus_kelas')->nullable();
            $table->unsignedBigInteger('agama');
            $table->unsignedBigInteger('tahun_ajaran')->nullable();
            $table->foreign('gender')->references('id')->on('genders');
            $table->foreign('kelas')->references('id')->on('kelas');
            $table->foreign('jurusan')->references('id')->on('jurusans');
            $table->foreign('pengurus_kelas')->references('id')->on('pengurus_kelas');
            $table->foreign('agama')->references('id')->on('agamas');
            $table->foreign('tahun_ajaran')->references('id')->on('tahun_ajarans');
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
        Schema::dropIfExists('murids');
    }
}
