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
            $table->foreignId('id_perumahan')
                ->constrained('perumahan')
                ->onDelete('cascade');
            $table->foreignId('id_fasilitas')
                ->constrained('fasilitas')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('fasilitas_perumahan');
    }
};
