<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStaticAttributesTable extends Migration
{
    public function up(): void
    {
        Schema::create('static_attributes', static function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->json('data');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('static_attributes');
    }
}
