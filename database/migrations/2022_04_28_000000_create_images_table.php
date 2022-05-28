<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('images', static function (Blueprint $table) {
            $table->id();
            $table->string('file')->unique();
            $table->string('file_original');
            $table->string('name')->nullable();
            $table->string('description')->nullable();
            $table->float('price')->nullable();
            $table->smallInteger('order_column');
            $table->boolean('published');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('image_coordinates', static function (Blueprint $table) {
            $table->id();
            $table->foreignId('image_id')->nullable()->constrained('images')->cascadeOnUpdate();
            $table->json('data')->nullable();
            $table->smallInteger('order_column');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('image_coordinates');
        Schema::dropIfExists('images');
    }
};
