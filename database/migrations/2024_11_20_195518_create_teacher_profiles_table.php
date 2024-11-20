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
        Schema::create('teacher_profiles', function (Blueprint $table) {
            $table->id(); // Auto-increment primary key
            $table->unsignedBigInteger('role_id'); // Role foreign key
            $table->unsignedBigInteger('user_id'); // User foreign key
            $table->string('name'); // Full name
            $table->string('nick_name')->nullable(); // Optional nick name
            $table->string('certificate')->nullable(); // Path to certificate image
            $table->text('about_me')->nullable(); // About Me section
            $table->integer('class_strength')->nullable(); // Class strength
            $table->json('teaching_style')->nullable(); // Multiple values as JSON
            $table->timestamps(); // Created and Updated timestamps

            // Foreign key constraints
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teacher_profiles');
    }
};
