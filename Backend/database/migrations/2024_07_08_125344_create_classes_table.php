<?php

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
        Schema::create('classes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('start_seat_id');
            $table->unsignedBigInteger('end_seat_id');
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('start_seat_id')->references('id')->on('seats')->onDelete('cascade');
            $table->foreign('end_seat_id')->references('id')->on('seats')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classes');
    }
};