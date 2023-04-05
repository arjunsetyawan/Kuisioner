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
        Schema::create('karyawan', function (Blueprint $table) {
            $table->integer('id')->index();
            $table->string('nama');
            $table->date('tanggal_masuk');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('gender');
            $table->string('alamat');
            $table->integer('divisi_id');
            $table->foreign('divisi_id')->references('id')->on('divisi')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('no_telp');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
