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
        Schema::create('contents', function (Blueprint $table) {
            $table->id();/* The lines you provided are defining the structure of a database table named
            `contents`. Specifically, the lines: */
            
            $table->string('name');
            $table->string('file_type');            
            $table->longText('description')->nullable();
            $table->foreignId('course_id')->nullable();
            $table->foreignId('class_id')->nullable();
            $table->foreignId('user_id');
            $table->enum('user_type',['Admin','Teacher']);
            $table->longText('path')->nullable();
            $table->longText('youtube_link')->nullable();
            $table->enum('type',['youtube_link','file']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contents');
    }
};
