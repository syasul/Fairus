<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('fasilitas_perumahan', function (Blueprint $table) {
            $table->id();

            // Foreign key ke tabel 'fasilitas'
            $table->unsignedBigInteger('id_fasilitas');
            $table->foreign('id_fasilitas')->references('id_fasilitas')->on('fasilitas')->onDelete('cascade');

            // Foreign key ke tabel 'perumahan'
            $table->unsignedBigInteger('id_perumahan');
            $table->foreign('id_perumahan')->references('id_perumahan')->on('perumahan')->onDelete('cascade');

            $table->timestamps();
            // $table->id();
            // // Foreign key ke tabel 'perumahan'
            // $table->foreignId('id_perumahan')
            //     ->constrained('perumahan') // Referensi ke tabel 'perumahan'
            //     ->onDelete('cascade'); // Hapus relasi jika perumahan dihapus

            // // Foreign key ke tabel 'fasilitas'
            // $table->foreignId('id_fasilitas')
            //     ->constrained('fasilitas') // Referensi ke tabel 'fasilitas'
            //     ->onDelete('cascade'); // Hapus relasi jika fasilitas dihapus

            // $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('fasilitas_perumahan');
    }
};
