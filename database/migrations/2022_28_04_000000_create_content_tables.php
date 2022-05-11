<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContentTables extends Migration
{
    public function up(): void
    {
        Schema::create('content_blocks', static function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('title')->nullable();
            $table->text('body')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('content_components', static function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('model');
            $table->string('columns');
            $table->text('view')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('content_components');
        Schema::dropIfExists('content_blocks');
    }
}
