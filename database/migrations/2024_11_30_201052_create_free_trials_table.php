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
        Schema::create('free_trials', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('english_name');
            $table->integer('age');
            $table->string('phone');
            $table->string('email')->unique();
            $table->enum('gender', ['male', 'female']);
            $table->text('introduction');
            $table->date('class_date');
            $table->time('time');
            $table->text('requests')->nullable();
            $table->string('signup_path');
            $table->string('coupon')->nullable();
            $table->timestamps(); // Adds created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('free_trials');
    }
};
