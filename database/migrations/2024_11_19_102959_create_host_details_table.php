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
        Schema::create('Host_Details', function (Blueprint $table) {
            $table->id('host_id');  // Custom primary key
            $table->unsignedBigInteger('user_id');            
            $table->string('id_card');

            $table->foreign('user_id')->references('user_id')->on('Users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('host_details');
    }
};
