<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCateringTables extends Migration
{
    public function up(): void
    {
        Schema::create('caterings', static function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('note')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('caterings');
    }
}
