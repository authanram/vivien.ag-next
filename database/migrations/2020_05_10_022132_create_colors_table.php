<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateColorsTable extends Migration
{
    final public function up(): void
    {
        Schema::create('colors', static function (Blueprint $table) {
            $table->unsignedBigInteger('id')->autoIncrement();
            $table->uuid('uuid');
            $table->string('color');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    final public function down(): void
    {
        Schema::dropIfExists('colors');
    }
}
