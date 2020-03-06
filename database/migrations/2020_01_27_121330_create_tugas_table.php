<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTugasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tugas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama');
            $table->date('tgl_mulai');
            $table->date('deadline');
            $table->unsignedBigInteger('guru_id');
            $table->unsignedBigInteger('kelas_id');
            $table->unsignedBigInteger('mapel_id');
            $table->unsignedBigInteger('jurusan_id');
            $table->string('kategory')->default('individu');
            $table->text('desc')->nullable();
            $table->boolean('selesai')->default(false);
            $table->foreign('guru_id')->references('id')->on('gurus');
            $table->foreign('kelas_id')->references('id')->on('kelas');
            $table->foreign('mapel_id')->references('id')->on('mapels');
            $table->foreign('jurusan_id')->references('id')->on('jurusans');
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
        Schema::dropIfExists('tugas');
    }
}
