<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContentTables extends Migration
{
    public function up(): void
    {
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
            $table->foreignId('route_id')->constrained('routes')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('content_id')->constrained('contents')->cascadeOnUpdate()->cascadeOnDelete();
            $table->smallInteger('order_column');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('route_contents');
        Schema::dropIfExists('contents');
    }
}
