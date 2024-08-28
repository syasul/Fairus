<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('rumah', function (Blueprint $table) {
            $table->id('id_rumah');
            $table->string('gambar_rumah');
            $table->string('tipe');
            $table->foreignId('id_perumahan')->constrained('perumahan');
            $table->integer('lantai_rumah');
            $table->text('deskripsi');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('rumah');
    }
};
