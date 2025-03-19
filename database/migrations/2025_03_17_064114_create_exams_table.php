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
        Schema::create('exams', function (Blueprint $table) {
            
                $table->id();
              
            
                $table->foreignId('user_id');
                $table->foreignId('class_id')->nullable();
                $table->string('title');
                $table->enum('type', ['practice', 'live']);
                $table->enum('version', ['english', 'bangla']);
                $table->foreignId('course_id')->nullable();
                //$table->foreignId('subject_id')->constrained()->onDelete('cascade');
              
                $table->integer('duration'); // in minutes
                $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exams');
    }
};
