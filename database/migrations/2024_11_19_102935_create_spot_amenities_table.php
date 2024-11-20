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
        Schema::create('Spot_Amenities', function (Blueprint $table) {
            $table->id('amenity_id');  // Custom primary key
            $table->unsignedBigInteger('spot_id');
            $table->boolean('is_covered')->default(false);
            $table->boolean('has_security')->default(false);
            $table->boolean('has_ev_charging')->default(false);
            $table->boolean('is_handicap_accessible')->default(false);
            $table->boolean('has_lighting')->default(false);
            $table->boolean('has_cctv')->default(false);

            $table->foreign('spot_id')->references('spot_id')->on('Parking_Spots')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('spot_amenities');
    }
};
