<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStaffTables extends Migration
{
    public function up(): void
    {
        Schema::create('staffs', static function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('occupation')->nullable();
            $table->string('image_url')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('staff_events', static function (Blueprint $table) {
            $table->foreignId('staff_id')->constrained('staffs')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('event_id')->constrained('events')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('staffs');
    }
}
