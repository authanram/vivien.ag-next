<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenuTables extends Migration
{
    final public function up(): void
    {
        Schema::create('menus', static function (Blueprint $table) {
            $table->unsignedBigInteger('id')->autoIncrement();
            $table->uuid('uuid');
            $table->string('slug');
            $table->boolean('published');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('menu_items', static function (Blueprint $table) {
            $table->unsignedBigInteger('id')->autoIncrement();
            $table->unsignedBigInteger('menu_id');
            $table->unsignedBigInteger('route_id');
            $table->unsignedBigInteger('color_id');
            $table->string('label');
            $table->string('dropdown_breakpoint')->nullable();
            $table->boolean('published');
            $table->integer('sort_order');
            $table->timestamps();

            $table->foreign('menu_id')
                ->references('id')
                ->on('menus')
                ->onDelete('cascade');

            $table->foreign('route_id')
                ->references('id')
                ->on('routes')
                ->onDelete('cascade');

            $table->foreign('color_id')
                ->references('id')
                ->on('colors')
                ->onDelete('cascade');
        });
    }

    final public function down(): void
    {
        Schema::dropIfExists('menus');
        Schema::dropIfExists('menu_items');
    }
}
