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
        Schema::create('Wallets', function (Blueprint $table) {
            $table->id('wallet_id');  // Custom primary key
            $table->unsignedBigInteger('user_id');
            $table->decimal('balance', 10, 2);
            $table->timestamp('last_updated');

            $table->foreign('user_id')->references('user_id')->on('Users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wallets');
    }
};
