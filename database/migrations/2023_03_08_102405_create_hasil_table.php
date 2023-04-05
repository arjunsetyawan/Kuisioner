<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hasil', function (Blueprint $table) {
            $table->integer('id')->index();
            $table->integer('pertanyaan_id');
            $table->foreign('pertanyaan_id')->references('id')->on('pertanyaan')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('karyawan_id');
            // $table->foreign('karyawan_id')->references('id')->on('karyawan')->onDelete('cascade')->onUpdate('cascade');
            $table->dateTime('tanggal_pengisian');
            $table->integer('value_form');
            $table->string('value_essay');
            $table->string('periode');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hasil');
    }
};
