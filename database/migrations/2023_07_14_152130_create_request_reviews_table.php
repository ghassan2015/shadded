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
        Schema::create('request_reviews', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('userId');
            $table->bigInteger('driverId');
            $table->bigInteger('requestId');
            $table->text('message')->nullable();
            $table->decimal('rate');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('request_reviews');
    }
};
