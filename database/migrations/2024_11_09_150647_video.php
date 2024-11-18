<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('video_perumahan', function (Blueprint $table) {
            $table->id('id_video');
            $table->foreignId('id_perumahan')->references('id_perumahan')->on('perumahan')->onDelete('cascade');
            $table->string('video');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('video_perumahan');
    }
};
