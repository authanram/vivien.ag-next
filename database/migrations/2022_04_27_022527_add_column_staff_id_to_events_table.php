<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnStaffIdToEventsTable extends Migration
{
    final public function up(): void
    {
        Schema::table('events', static function (Blueprint $table) {
            $table->unsignedBigInteger('staff_id')->nullable()->after('event_catering_id');

            $table->foreign('staff_id')
                ->references('id')
                ->on('staffs')
                ->onDelete('cascade');
        });
    }

    final public function down(): void
    {
        Schema::table('events', static function (Blueprint $table) {
            $table->dropColumn('staff_id');
        });
    }
}
