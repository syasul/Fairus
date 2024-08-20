<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('saless', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // The section name, e.g., 'home', 'aboutMe'
            $table->text('content')->nullable(); // Content for the section
            $table->text('subcontent')->nullable(); // Subcontent for additional fields like subtext
            $table->text('description')->nullable(); // Description or additional content
            $table->string('image_path')->nullable(); // Path to the section's image
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
        Schema::dropIfExists('saless');
    }
};
