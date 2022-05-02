<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContentTables extends Migration
{
    public function up(): void
    {
        Schema::create('content_fields', static function (Blueprint $table) {
            $table->id();
            $table->string('slug');
            $table->string('type');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('content_layouts', static function (Blueprint $table) {
            $table->id();
            $table->string('slug');
            $table->text('value');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('content_blocks', static function (Blueprint $table) {
            $table->id();
            $table->foreignId('content_layout_id')->constrained('content_layouts')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('slug');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('content_block_fields', static function (Blueprint $table) {
            $table->id();
            $table->foreignId('content_block_id')->index()->constrained('content_blocks')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('content_field_id')->index()->constrained('content_fields')->cascadeOnUpdate()->cascadeOnDelete();
            $table->smallInteger('order_column')->nullable();
        });

        Schema::create('content_views', static function (Blueprint $table) {
            $table->id();
            $table->string('slug');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('content_view_blocks', static function (Blueprint $table) {
            $table->id();
            $table->foreignId('content_view_id')->index()->constrained('content_views')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('content_block_id')->index()->constrained('content_blocks')->cascadeOnUpdate()->cascadeOnDelete();
            $table->smallInteger('order_column')->nullable();
        });

        Schema::create('contents', static function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('title');
            $table->string('caption')->nullable();
            $table->text('body');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('route_contents', static function (Blueprint $table) {
            $table->id();
            $table->foreignId('route_id')->constrained('routes')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('content_id')->constrained('contents')->cascadeOnUpdate()->cascadeOnDelete();
            $table->smallInteger('order_column');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('route_contents');
        Schema::dropIfExists('contents');
        Schema::dropIfExists('content_view_blocks');
        Schema::dropIfExists('content_views');
        Schema::dropIfExists('content_block_fields');
        Schema::dropIfExists('content_blocks');
        Schema::dropIfExists('content_layouts');
        Schema::dropIfExists('content_fields');
    }
}
