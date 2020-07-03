<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParsedownCodesTable extends Migration
{
    final public function up(): void
    {
        Schema::create('parsedown_codes', static function (Blueprint $table) {
            $table->unsignedBigInteger('id')->autoIncrement();
            $table->text('search');
            $table->text('replace');
            $table->text('description')->nullable();
            $table->boolean('before_parsedown')->default(false);
            $table->timestamps();
        });
    }

    final public function down(): void
    {
        Schema::dropIfExists('parsedown_codes');
    }
}
