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
        Schema::create('Parking_Spots', function (Blueprint $table) {
            $table->id('spot_id');  // Custom primary key
            $table->unsignedBigInteger('host_id');  // Foreign key to Users table
            $table->decimal('longitude', 10, 6);
            $table->decimal('latitude', 10, 6);
            $table->decimal('price_per_hour', 8, 2);
            $table->string('car_type');
            $table->string('title');
            $table->text('main_description');
            $table->float('overall_rating')->nullable();
            $table->string('status');

            $table->foreign('host_id')->references('user_id')->on('Users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parking_spots');
    }
};
