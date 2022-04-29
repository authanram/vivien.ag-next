<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoutesTable extends Migration
{
    public function up(): void
    {
        Schema::create('routes', static function (Blueprint $table) {
            $table->id();
            $table->string('path');
            $table->string('route');
            $table->string('action');
            $table->string('title');
            $table->boolean('published');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('routes');
    }
}
