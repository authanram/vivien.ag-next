<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagTables extends Migration
{
    public function up(): void
    {
        Schema::create('tags', static function (Blueprint $table) {
            $table->id();
            $table->foreignId('color_id')->nullable()->default(9)->constrained('colors')->cascadeOnUpdate();
            $table->json('name');
            $table->json('slug');
            $table->string('type')->nullable();
            $table->smallInteger('order_column')->nullable();
            $table->timestamps();
        });

        Schema::create('taggables', static function (Blueprint $table) {
            $table->foreignId('tag_id')->constrained('tags')->cascadeOnUpdate()->cascadeOnDelete();
            $table->morphs('taggable');
            $table->unique(['tag_id', 'taggable_id', 'taggable_type']);
        });
    }

    public function down(): void
    {
        Schema::drop('taggables');
        Schema::drop('tags');
    }
}
