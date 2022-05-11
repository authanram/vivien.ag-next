<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddContentViewIdToRoutesTable extends Migration
{
    public function up(): void
    {
        Schema::table('routes', static function (Blueprint $table) {
            $table->foreignId('content_view_id')
                ->after('id')
                ->nullable()
                ->constrained('content_blocks')
                ->cascadeOnUpdate();
        });
    }

    public function down(): void
    {
        Schema::dropColumns('routes', ['content_view_id']);
    }
}
