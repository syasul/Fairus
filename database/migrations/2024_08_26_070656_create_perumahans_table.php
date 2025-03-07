<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('perumahan', function (Blueprint $table) {
            $table->id('id_perumahan');
            $table->string('gambar_perumahan');
            $table->string('nama_perumahan');
            $table->text('deskripsi_singkat');
            $table->string('gambar_jumbotron');
            $table->string('about_perumahan_sub_title');
            $table->text('about_perumahan_content');
            $table->string('about_perumahan_image');
            $table->text('alasan_perumahan_content');
            $table->string('about_perumahan_image1');
            $table->string('about_perumahan_image2');
            $table->string('fasilitas_perumahan_title');
            $table->string('maps_perumahan_sub_title');
            $table->text('maps_perumahan_content');
            $table->string('maps_perumahan_image');
            $table->string('pembayaran_perumahan_title');
            $table->text('pembayaran_perumahan_content');
            $table->string('penghargaan_title');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('perumahan');
    }
};
