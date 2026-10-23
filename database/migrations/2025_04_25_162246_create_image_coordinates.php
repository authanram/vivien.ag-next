<?php

use App\Models\Image;
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
        Schema::create('image_coordinates', function (Blueprint $table) {
            $table->id();
            $table->uuid();
            $table->foreignIdFor(Image::class);
            $table->boolean('active')->default(true);
            $table->string('position')->default('left');
            $table->integer('top')->default(0);
            $table->integer('left')->default(0);
            $table->decimal('height', 8, 1)->default(200);
            $table->integer('rotate')->default(0);
            $table->integer('rotate_x')->default(0);
            $table->integer('rotate_y')->default(0);
            $table->integer('perspective')->default(500);
            $table->integer('zindex')->default(1);
            $table->integer('order_column')->default(1);
            $table->timestamps();
            $table->softDeletes();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();
        });
    }
};
