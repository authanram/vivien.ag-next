<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagesTable extends Migration
{
    final public function up(): void
    {
        Schema::create('images', static function (Blueprint $table) {
            $table->unsignedBigInteger('id')->autoIncrement();
            $table->uuid('uuid');
            $table->string('file');
            $table->string('file_original');
            $table->string('name')->nullable();
            $table->string('description')->nullable();
            $table->integer('price')->nullable();
            $table->integer('order_column');
            $table->boolean('published');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('image_coords', static function (Blueprint $table) {
            $table->unsignedBigInteger('id')->autoIncrement();
            $table->uuid('uuid');
            $table->unsignedBigInteger('image_id');
            $table->json('coords');
            $table->integer('order_column');
            $table->timestamps();

            $table->foreign('image_id')
                ->references('id')
                ->on('images')
                ->onDelete('cascade');
        });
    }

    final public function down(): void
    {
        Schema::dropIfExists('image_coords');
        Schema::dropIfExists('images');
    }
}
