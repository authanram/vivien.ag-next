<?php

use App\Models\CookieConsentProvider;
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
        Schema::create('cookie_consent_providers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('url');
            $table->timestamps();
        });

        Schema::create('cookie_consent_cookies', function (Blueprint $table) {
            $table->id();
            $table->string('cookie_name')->unique();
            $table->foreignIdFor(CookieConsentProvider::class)->constrained()->cascadeOnDelete();
            $table->text('cookie_purpose');
            $table->string('cookie_category');
            $table->string('cookie_type');
            $table->integer('cookie_lifetime');
            $table->boolean('encrypted')->default(false);
            $table->boolean('required')->default(false);
            $table->timestamps();
        });
    }
};
