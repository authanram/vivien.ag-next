<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagTables extends Migration
{
    final public function up(): void
    {
        Schema::create('tags', static function (Blueprint $table) {
            $table->unsignedBigInteger('id')->autoIncrement();
            $table->json('name');
            $table->json('slug');
            $table->string('type')->nullable();
            $table->unsignedBigInteger('color_id')->default(9);
            $table->integer('order_column')->nullable();
            $table->timestamps();

            $table->foreign('color_id')
                ->references('id')
                ->on('colors')
                ->onDelete('cascade');
        });

        Schema::create('taggables', static function (Blueprint $table) {
            $table->unsignedBigInteger('tag_id')->unsigned();
            $table->morphs('taggable');
            $table->unique(['tag_id', 'taggable_id', 'taggable_type']);

            $table->foreign('tag_id')
                ->references('id')
                ->on('tags')
                ->onDelete('cascade');
        });
    }

    final public function down(): void
    {
        Schema::drop('taggables');
        Schema::drop('tags');
    }
}
