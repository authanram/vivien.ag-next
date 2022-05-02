<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddContentViewIdToRoutesTable extends Migration
{
    public function up(): void
    {
        Schema::table('routes', static function (Blueprint $table) {
            $table->foreignId('content_view_id')
                ->after('path')
                ->nullable()
                ->constrained('content_views')
                ->cascadeOnUpdate();
        });
    }

    public function down(): void
    {
    }
}
