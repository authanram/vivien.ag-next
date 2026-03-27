<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('events', function (Blueprint $table) {
            $table->dropColumn('event_location_id');
            $table->string('event_location')->nullable();
            $table->string('custom_event_location')->nullable();
        });

        Schema::table('events', function (Blueprint $table) {
            $table->dropColumn('catering');
        });

        Schema::table('events', function (Blueprint $table) {
            $table->jsonb('catering')->nullable();
        });

        Schema::dropIfExists('event_locations');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::create('event_locations', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->text('name');
            $table->text('description')->nullable();
            $table->text('address')->nullable();
            $table->text('url')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();
        });

        Schema::table('events', function (Blueprint $table) {
            $table->string('catering')->nullable()->change();
        });

        Schema::table('events', function (Blueprint $table) {
            $table->dropColumn(['event_location', 'custom_event_location']);
            $table->foreignId('event_location_id');
        });
    }
};
