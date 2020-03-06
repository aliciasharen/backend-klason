<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMuridTugasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('murid_tugas');
        Schema::create('murid_tugas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('tugas_id');
            $table->unsignedBigInteger('murid_id');
            $table->boolean('selesai')->default(false);
            $table->boolean('notif')->default(false);
            $table->dateTime('pengumpulan')->nullable();
            $table->string('pra_column_file')->nullable();
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
        Schema::dropIfExists('murid_tugas');
    }
}
