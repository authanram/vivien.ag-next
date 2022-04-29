<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventTables extends Migration
{
    public function up(): void
    {
        Schema::create('event_templates', static function (Blueprint $table) {
            $table->id();
            $table->foreignId('color_id')->nullable()->constrained('colors');
            $table->string('name');
            $table->text('description')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('events', static function (Blueprint $table) {
            $table->id();
            $table->uuid()->index();
            $table->foreignId('creator_id')->constrained('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('event_template_id')->constrained('event_templates')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('catering_id')->nullable()->constrained('caterings')->cascadeOnUpdate();
            $table->string('catering')->nullable();
            $table->foreignId('location_id')->nullable()->constrained('locations')->cascadeOnUpdate();
            $table->string('lead')->nullable();
            $table->text('description')->nullable();
            $table->timestamp('date_from')->nullable();
            $table->timestamp('date_to')->nullable();
            $table->smallInteger('registrations_limit')->default(10);
            $table->smallInteger('registrations_reserved')->nullable();
            $table->float('price')->nullable();
            $table->string('price_note')->nullable();
            $table->boolean('published')->default(false);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('event_registrations', static function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignId('event_id')->constrained('events');
            $table->string('hash', 64);
            $table->smallInteger('salutation');
            $table->string('firstname');
            $table->string('surname');
            $table->string('phone');
            $table->string('email');
            $table->smallInteger('seats')->default(1);
            $table->text('message')->nullable();
            $table->string('ip_address');
            $table->text('user_agent');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('event_registrations');
        Schema::dropIfExists('events');
        Schema::dropIfExists('event_templates');
    }
}
