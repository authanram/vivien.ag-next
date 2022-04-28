<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventCateringsTable extends Migration
{
    final public function up(): void
    {
        Schema::create('event_caterings', static function (Blueprint $table) {
            $table->unsignedBigInteger('id')->autoIncrement();
            $table->uuid('uuid');
            $table->string('name')->unique();
            $table->string('note')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    final public function down(): void
    {
        Schema::dropIfExists('event_caterings');
    }
}
