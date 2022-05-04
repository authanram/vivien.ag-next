<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContentTables extends Migration
{
    public function up(): void
    {
        Schema::create('content_blocks', static function (Blueprint $table) {
            $table->id();
            $table->string('slug');
            $table->text('body')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('content_views', static function (Blueprint $table) {
            $table->id();
            $table->string('slug');
            $table->text('body')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('content_view_blocks', static function (Blueprint $table) {
            $table->id();
            $table->foreignId('content_view_id')->index()->constrained('content_views')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('content_block_id')->index()->constrained('content_blocks')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('slug');
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

        Schema::create('route_content_views', static function (Blueprint $table) {
            $table->id();
            $table->foreignId('route_id')->constrained('routes')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('content_view_id')->constrained('content_views')->cascadeOnUpdate()->cascadeOnDelete();
            $table->boolean('published');
            $table->smallInteger('order_column');
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
        Schema::dropIfExists('content_blocks');
    }
}
