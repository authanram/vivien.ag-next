<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRoutesTable extends Migration
{
    public function up(): void
    {
        Schema::create('routes', static function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('uri');
            $table->morphs('routable');
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
