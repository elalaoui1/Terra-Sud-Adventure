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
        Schema::create('translate_langauges', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tour_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('tour_day_id')->nullable()->constrained()->onDelete('cascade');
            $table->string('name')->nullable();
            $table->enum('lang_code',['en','es']);
            $table->text('description')->nullable();
            $table->text('overview')->nullable();
            $table->string('title')->nullable();
            $table->text('content')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('translate_langauges');
    }
};
