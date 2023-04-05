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
        Schema::create('pertanyaan', function (Blueprint $table) {
            $table->integer('id')->index();
            $table->integer('kriteria_id');
            $table->foreign('kriteria_id')->references('id')->on('kriteria')->onUpdate('cascade')->onDelete('cascade');
            $table->string('nama_pertanyaan');
            $table->dateTime('periode_kuisioner');
            $table->string('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pertanyaan');
    }
};
