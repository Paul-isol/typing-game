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
        Schema::create('word', function (Blueprint $table) {
            $table->id();
            $table->string('word')->unique();
            $table->enum('difficulty',['easy','medium','hard'])->default('easy');
            $table->timestamps();

            $table->index('difficulty');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('word');
    }
};
