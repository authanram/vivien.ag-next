<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRoutesTable extends Migration
{
    public function up(): void
    {
        Schema::create('routes', static function (Blueprint $table) {
            $table->id();
            $table->string('uri');
            $table->string('name');
            $table->json('middlewares')->nullable();
            $table->string('type')->nullable();
            $table->json('action')->nullable();
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
