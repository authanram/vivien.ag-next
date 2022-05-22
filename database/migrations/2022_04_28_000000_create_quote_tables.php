<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuoteTables extends Migration
{
    public function up(): void
    {
        Schema::create('authors', static function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('occupation')->nullable();
            $table->string('url')->nullable();
            $table->boolean('published');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('quotes', static function (Blueprint $table) {
            $table->id();
            $table->foreignId('author_id')->constrained('authors')->cascadeOnUpdate()->cascadeOnDelete();
            $table->text('body');
            $table->boolean('published');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('quotes');
        Schema::dropIfExists('authors');
    }
}
