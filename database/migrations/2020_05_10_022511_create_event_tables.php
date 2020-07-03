<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventTables extends Migration
{
    final public function up(): void
    {
        Schema::create('event_locations', static function (Blueprint $table) {
            $table->unsignedBigInteger('id')->autoIncrement();
            $table->uuid('uuid');
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('address')->nullable();
            $table->string('url')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('event_types', static function (Blueprint $table) {
            $table->unsignedBigInteger('id')->autoIncrement();
            $table->unsignedBigInteger('color_id')->default(9);
            $table->uuid('uuid');
            $table->string('name');
            $table->text('description')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('color_id')
                ->references('id')
                ->on('colors')
                ->onDelete('cascade');
        });

        Schema::create('events', static function (Blueprint $table) {
            $table->unsignedBigInteger('id')->autoIncrement();
            $table->unsignedBigInteger('creator_id');
            $table->unsignedBigInteger('event_type_id')->nullable();
            $table->unsignedBigInteger('event_location_id')->nullable();
            $table->uuid('uuid');
            $table->text('description')->nullable();
            $table->timestamp('date_from');
            $table->timestamp('date_to');
            $table->integer('maximum_attendees')->default(10);
            $table->integer('reserved_seats')->nullable();
            $table->integer('price')->nullable();
            $table->string('price_note')->nullable();
            $table->string('catering')->nullable();
            $table->string('lead')->nullable();
            $table->boolean('published');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('creator_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('event_type_id')
                ->references('id')
                ->on('event_types')
                ->onDelete('cascade');

            $table->foreign('event_location_id')
                ->references('id')
                ->on('event_locations')
                ->onDelete('cascade');
        });

        Schema::create('attendees', static function (Blueprint $table) {
            $table->unsignedBigInteger('id')->autoIncrement();
            $table->unsignedBigInteger('event_id')->nullable();
            $table->uuid('uuid');
            $table->string('hash', 64);
            $table->integer('salutation');
            $table->string('firstname');
            $table->string('surname');
            $table->string('phone');
            $table->string('email');
            $table->smallInteger('attendance')->default(1);
            $table->text('message')->nullable();
            $table->string('ip_address');
            $table->text('user_agent');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('event_id')
                ->references('id')
                ->on('events')
                ->onDelete('cascade');
        });
    }

    final public function down(): void
    {
        Schema::dropIfExists('attendees');
        Schema::dropIfExists('event_types');
        Schema::dropIfExists('events');
        Schema::dropIfExists('event_categories');
        Schema::dropIfExists('event_locations');
    }
}
