<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContentTables extends Migration
{
    public function up(): void
    {
        Schema::create('content_blocks', static function (Blueprint $table) {
            $table->id();
            $table->string('type')->nullable();
            $table->string('name');
            $table->string('slug');
            $table->text('value');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('content_views', static function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('content_view_sections', static function (Blueprint $table) {
            $table->id();
            $table->foreignId('content_view_id')->constrained('content_views')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('name');
            $table->string('type');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('content_view_sections_blocks', static function (Blueprint $table) {
            $table->id();
            $table->foreignId('content_view_section_id')->constrained('content_view_sections')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('content_block_id')->constrained('content_blocks')->cascadeOnUpdate()->cascadeOnDelete();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('content_view_sections_blocks');
        Schema::dropIfExists('content_view_sections');
        Schema::dropIfExists('content_views');
        Schema::dropIfExists('content_blocks');
    }
}
