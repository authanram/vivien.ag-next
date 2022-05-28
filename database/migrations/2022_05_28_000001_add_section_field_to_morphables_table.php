<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('morphables', function (Blueprint $table) {
            $table->string('section')->nullable()->after('order_column');
        });
    }

    public function down(): void
    {
        Schema::table('morphables', function (Blueprint $table) {
            $table->dropColumn('section');
        });
    }
};
