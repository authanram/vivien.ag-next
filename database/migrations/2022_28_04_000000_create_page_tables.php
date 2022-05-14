<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePageTables extends Migration
{
    public function up(): void
    {
        Schema::create('layouts', static function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('view_alias');
            $table->json('sections');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('static_blocks', static function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->text('value');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('pages', static function (Blueprint $table) {
            $table->id();
            $table->foreignId('layout_id')->constrained('layouts')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('name')->unique();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('page_static_blocks', static function (Blueprint $table) {
            $table->id();
            $table->foreignId('page_id')->constrained('pages')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('static_block_id')->constrained('static_blocks')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('section')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('page_static_blocks');
        Schema::dropIfExists('pages');
        Schema::dropIfExists('static_blocks');
        Schema::dropIfExists('layouts');
    }
}
