<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContentTables extends Migration
{
    public function up(): void
    {
        Schema::create('content_layouts', static function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('view_alias');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('content_layout_sections', static function (Blueprint $table) {
            $table->id();
            $table->foreignId('content_layout_id')->constrained('content_layouts')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('name');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('content_blocks', static function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->text('value');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('content_pages', static function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('layout')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('content_page_layout_sections', static function (Blueprint $table) {
            $table->id();
            $table->foreignId('content_page_id')->constrained('content_pages')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('content_layout_section_id')->constrained('content_layout_sections')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('field')->nullable();
            $table->text('value')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('content_page_blocks', static function (Blueprint $table) {
            $table->id();
            $table->foreignId('content_page_id')->constrained('content_pages')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('content_block_id')->constrained('content_blocks')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('section');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('content_page_blocks');
        Schema::dropIfExists('content_page_layout_sections');
        Schema::dropIfExists('content_pages');
        Schema::dropIfExists('content_blocks');
        Schema::dropIfExists('content_layout_sections');
        Schema::dropIfExists('content_layouts');
    }
}
