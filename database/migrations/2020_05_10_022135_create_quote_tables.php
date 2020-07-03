<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuoteTables extends Migration
{
    final public function up(): void
    {
        Schema::create('authors', static function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid('uuid');
            $table->text('name')->nullable();
            $table->text('occupation')->nullable();
            $table->text('url')->nullable();
            $table->boolean('published');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('quotes', static function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid('uuid');
            $table->text('body');
            $table->unsignedBigInteger('author_id');
            $table->boolean('published');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('author_id')
                ->references('id')
                ->on('authors')
                ->onDelete('cascade');
        });
    }

    final public function down(): void
    {
        Schema::dropIfExists('quotes');
        Schema::dropIfExists('authors');
    }
}
