<?php

use App\Models\Event;
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
        Schema::create('event_attendees', function (Blueprint $table) {
            $table->id();
            $table->uuid();
            $table->foreignIdFor(Event::class);
            $table->string('salutation');
            $table->text('firstname');
            $table->text('surname');
            $table->text('phone');
            $table->text('email');
            $table->smallInteger('attendance')->default(1);
            $table->boolean('confirmed')->default(true);
            $table->text('message')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();
        });
    }
};
