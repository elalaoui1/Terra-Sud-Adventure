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
       Schema::create('tour_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tour_id')->nullable()->constrained('tours')->nullOnDelete();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->enum('type', ['public', 'custom']);
            $table->integer('adult_people');
            $table->integer('kids_people')->default(0);
            $table->date('date_from')->nullable();
            $table->date('date_to')->nullable();
            $table->string('country')->nullable(); // this is where the user is from to know the language can be used to replay
            $table->string('from_city')->nullable(); // this is when the user need to start the tour from (morocco)
            $table->string('to_city')->nullable(); // this is when the user need to end the tour (morocco)
            $table->text('message')->nullable();
            $table->enum('status', ['pending', 'done', 'cancelled'])->default('pending');
            $table->enum('payment_status', ['unpaid', 'paid'])->default('unpaid');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tour_requests');
    }
};
