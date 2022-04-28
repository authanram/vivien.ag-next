<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStaffsTable extends Migration
{
    final public function up(): void
    {
        Schema::create('staffs', static function (Blueprint $table) {
            $table->unsignedBigInteger('id')->autoIncrement();
            $table->uuid('uuid');
            $table->string('name')->unique();
            $table->string('occupation')->nullable();
            $table->string('image_url')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    final public function down(): void
    {
        Schema::dropIfExists('staffs');
    }
}
