<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateColorsTable extends Migration
{
    public function up(): void
    {
        Schema::create('colors', static function (Blueprint $table) {
            $table->id();
            $table->string('color');
            $table->string('hex');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('colors');
    }
}
