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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tour_id')->constrained('tours');
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->integer('adult_people');
            $table->integer('kids_people')->default(0);
            $table->date('date_from')->nullable();
            $table->date('date_to')->nullable();
            $table->string('country')->nullable(); // this is where the user is from to know the language can be used to replay
            $table->decimal('price_total', 10, 2)->default(0);
            $table->enum('payment_method', ['credit_card'])->default('credit_card');
            $table->string('payment_reference_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
