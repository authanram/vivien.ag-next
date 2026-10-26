<?php

use App\Models\EventType;
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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->uuid();
            $table->foreignIdFor(EventType::class);
            $table->string('event_location')->nullable();
            $table->string('custom_event_location')->nullable();
            $table->text('description')->nullable();
            $table->string('event_day')->nullable();
            $table->timestamp('date_from');
            $table->timestamp('date_to');
            $table->integer('maximum_attendees')->default(10);
            $table->integer('reserved_seats')->nullable();
            $table->integer('price')->nullable();
            $table->text('price_note')->nullable();
            $table->jsonb('catering')->nullable();
            $table->text('lead')->nullable();
            $table->boolean('published');
            $table->timestamps();
            $table->softDeletes();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();
        });
    }
};
