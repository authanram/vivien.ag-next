<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenuTables extends Migration
{
    public function up(): void
    {
        Schema::create('menus', static function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->boolean('published');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('menu_items', static function (Blueprint $table) {
            $table->id();
            $table->foreignId('menu_id')->constrained('menus')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('route_id')->constrained('routes')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('color_id')->nullable()->constrained('colors');
            $table->string('label');
            $table->smallInteger('order_column');
            $table->boolean('published');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('menus');
        Schema::dropIfExists('menu_items');
    }
}
