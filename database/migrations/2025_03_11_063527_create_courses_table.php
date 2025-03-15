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
        Schema::create('courses', function (Blueprint $table) {
             $table->id();
             $table->foreignId('class_id');

            
             $table->string('name')->unique();
            $table->longText('description')->nullable();
            $table->decimal('price',10,2)->nullable();           
            $table->enum('type', ['Paid', 'Free']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
