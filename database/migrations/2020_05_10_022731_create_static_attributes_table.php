<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStaticAttributesTable extends Migration
{
    final public function up(): void
    {
        Schema::create('static_attributes', static function (Blueprint $table) {
            $table->unsignedBigInteger('id')->autoIncrement();
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->boolean('type');
            $table->string('value')->nullable();
            $table->json('data');
            $table->boolean('locked')->default(false);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    final public function down(): void
    {
        Schema::dropIfExists('static_attributes');
    }
}
