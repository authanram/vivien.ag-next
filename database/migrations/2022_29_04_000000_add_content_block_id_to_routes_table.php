<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddContentBlockIdToRoutesTable extends Migration
{
    public function up(): void
    {
        Schema::table('routes', static function (Blueprint $table) {
            $table->foreignId('content_block_id')
                ->after('id')
                ->nullable()
                ->constrained('content_blocks')
                ->cascadeOnUpdate();
        });
    }

    public function down(): void
    {
    }
}
