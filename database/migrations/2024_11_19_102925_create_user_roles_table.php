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
        Schema::create('User_Roles', function (Blueprint $table) {
            $table->id('userrole_id');  // Custom primary key
            $table->unsignedBigInteger('user_id');  // Ensure the user_id is unsignedBigInteger
            $table->unsignedBigInteger('role_id');  // Ensure the role_id is unsignedBigInteger

            // Foreign Key Constraints
            $table->foreign('user_id')->references('user_id')->on('Users')->onDelete('cascade');
            $table->foreign('role_id')->references('role_id')->on('Roles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_roles');
    }
};
