<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnEventCateringIdToEventsTable extends Migration
{
    final public function up(): void
    {
        Schema::table('events', static function (Blueprint $table) {
            $table->unsignedBigInteger('event_catering_id')->nullable()->after('event_location_id');

            $table->foreign('event_catering_id')
                ->references('id')
                ->on('event_caterings')
                ->onDelete('cascade');
        });
    }

    final public function down(): void
    {
        Schema::table('events', static function (Blueprint $table) {
            $table->dropColumn('event_catering_id');
        });
    }
}
