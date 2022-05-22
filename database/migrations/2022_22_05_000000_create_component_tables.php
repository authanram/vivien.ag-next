<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComponentTables extends Migration
{
    public function up(): void
    {
        Schema::create('components', static function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->json('data');
            $table->timestamps();
        });

        Schema::create('component_components', static function (Blueprint $table) {
            $table->id();
            $table->foreignId('component_id')->constrained('components')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('child_component_id')->constrained('components')->cascadeOnUpdate()->cascadeOnDelete();
            $table->json('data');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('components');
    }
}
