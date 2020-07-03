<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCookieConsentTables extends Migration
{
    final public function up(): void
    {
        Schema::create('cookie_consent_providers', static function (Blueprint $table) {
            $table->unsignedBigInteger('id')->autoIncrement();
            $table->string('name');
            $table->string('url');
            $table->timestamps();
        });

        Schema::create('cookie_consent_cookies', static function (Blueprint $table) {
            $table->unsignedBigInteger('id')->autoIncrement();
            $table->string('cookie_name');
            $table->unsignedBigInteger('cookie_consent_provider_id');
            $table->text('cookie_purpose');
            $table->string('cookie_category');
            $table->string('cookie_type');
            $table->integer('cookie_lifetime');
            $table->boolean('encrypted')->default(false);
            $table->boolean('required')->default(false);
            $table->timestamps();

            $table->foreign('cookie_consent_provider_id')
                ->references('id')
                ->on('cookie_consent_providers')
                ->onDelete('cascade');
        });

        Schema::create('cookie_consent_settings', static function (Blueprint $table) {
            $table->string('id')->unique();
            $table->json('cookie_data');
            $table->json('session_data');
            $table->timestamps();
        });
    }

    final public function down(): void
    {
        Schema::dropIfExists('cookie_consent_settings');
        Schema::dropIfExists('cookie_consent_cookies');
        Schema::dropIfExists('cookie_consent_providers');
    }
}
