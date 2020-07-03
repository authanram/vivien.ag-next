<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContentTables extends Migration
{
    final public function up(): void
    {
        Schema::create('contents', static function (Blueprint $table) {
            $table->unsignedBigInteger('id')->autoIncrement();
            $table->uuid('uuid');
            $table->text('slug');
            $table->text('caption')->nullable();
            $table->text('body');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('route_content', static function (Blueprint $table) {
            $table->unsignedBigInteger('route_id');
            $table->unsignedBigInteger('content_id');
            $table->integer('sort_order');
        });
    }

    final public function down(): void
    {
        Schema::dropIfExists('contents');
        Schema::dropIfExists('route_content');
    }
}
