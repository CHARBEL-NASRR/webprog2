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
        Schema::create('Availability', function (Blueprint $table) {
            $table->id('availability_id');  // Custom primary key
            $table->unsignedBigInteger('spot_id');
            $table->timestamp('start_time_availability');
            $table->timestamp('end_time_availability');
            $table->string('day');

            $table->foreign('spot_id')->references('spot_id')->on('Parking_Spots')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('availabilities');
    }
};
