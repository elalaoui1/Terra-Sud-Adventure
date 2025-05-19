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
        Schema::create('tours', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description');
            $table->text('overview')->nullable();
            $table->integer('duration_days');
            $table->text('main_image');
            $table->json('gallery_images')->nullable();
            $table->foreignId('start_location_id')->constrained('locations');
            $table->foreignId('end_location_id')->constrained('locations');
            $table->boolean('is_highlited')->default(false);
            $table->enum('difficulties', ['easy', 'medium','hard'])->default('easy');
            $table->foreignId('tour_type_id')->constrained('tour_types')->onDelete('cascade');
            $table->foreignId('section_id')->constrained('sections');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tours');
    }
};
