<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagesTable extends Migration
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

        Schema::create('image_coords', static function (Blueprint $table) {
            $table->id();
            $table->foreignId('image_id')->nullable()->constrained('images')->cascadeOnUpdate();
            $table->json('coords');
            $table->smallInteger('order_column');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('image_coords');
        Schema::dropIfExists('images');
    }
}
