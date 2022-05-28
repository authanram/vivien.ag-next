<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('views', static function (Blueprint $table) {
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
            $table->foreignId('view_id')->constrained('views')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('name')->unique();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pages');
        Schema::dropIfExists('static_blocks');
        Schema::dropIfExists('views');
    }
};
