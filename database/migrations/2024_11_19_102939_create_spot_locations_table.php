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
        Schema::create('Spot_Locations', function (Blueprint $table) {
            $table->id('location_id');  // Custom primary key
            $table->unsignedBigInteger('spot_id');
            $table->string('address');
            $table->string('city');
            $table->string('district');

            $table->foreign('spot_id')->references('spot_id')->on('Parking_Spots')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('spot_locations');
    }
};
