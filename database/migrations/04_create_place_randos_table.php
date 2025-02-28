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
        Schema::create('place_randos', function (Blueprint $table) {
            $table->id();
            $table->string('name_place_rando');
            $table->decimal('longitude_place_rando');
            $table->decimal('latitude_place_rando');
            $table->text('description_place_rando');
            $table->string('image_place_rando');
            $table->string('map_place_rando');
            $table->integer('distance_place_rando');
            $table->string('difficulty_place_rando');
            $table->time('estimated_time_place_rando');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('place_randos');
    }
};
