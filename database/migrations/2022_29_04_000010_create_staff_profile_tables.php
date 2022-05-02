<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStaffProfileTables extends Migration
{
    public function up(): void
    {
        Schema::create('staff_profiles', static function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('occupation')->nullable();
            $table->string('image_url')->nullable();
            $table->boolean('is_selected')->nullable();
            $table->timestamp('disabled_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('staff_events', static function (Blueprint $table) {
            $table->foreignId('staff_profile_id')->constrained('staff_profiles')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('event_id')->constrained('events')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('staff_events');
        Schema::dropIfExists('staff_profiles');
    }
}
