<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cookie_consent_providers', static function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('url');
            $table->timestamps();
        });

        Schema::create('cookie_consent_cookies', static function (Blueprint $table) {
            $table->id();
            $table->foreignId('cookie_consent_provider_id')->constrained('cookie_consent_providers')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('cookie_name');
            $table->text('cookie_purpose');
            $table->string('cookie_category');
            $table->string('cookie_type');
            $table->smallInteger('cookie_lifetime');
            $table->boolean('encrypted')->default(false);
            $table->boolean('required')->default(false);
            $table->timestamps();
        });

        Schema::create('cookie_consent_settings', static function (Blueprint $table) {
            $table->id();
            $table->json('cookie_data');
            $table->json('session_data');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cookie_consent_settings');
        Schema::dropIfExists('cookie_consent_cookies');
        Schema::dropIfExists('cookie_consent_providers');
    }
};
