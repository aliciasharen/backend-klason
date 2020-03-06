<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJurusanTingkatanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('jurusan_tingkatan');
        Schema::create('jurusan_tingkatan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('tingkatan_id');
            $table->unsignedBigInteger('jurusan_id');
            $table->string('kelas');
            $table->foreign('tingkatan_id')->references('id')->on('tingkatans');
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
        Schema::dropIfExists('jurusan_tingkatan');
    }
}
