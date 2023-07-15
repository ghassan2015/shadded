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
        Schema::create('drivers', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('userId');
            $table->bigInteger('driverType')->default(1);
            $table->bigInteger('serviceId');
            $table->bigInteger('countryId');
            $table->bigInteger('cityId');
            $table->string('firstName');
            $table->string('latName');
            $table->string('mobile')->unique();
            $table->string('email')->unique();
            $table->string('bankNumber');
            $table->bigInteger('personImageId');
            $table->bigInteger('IdPhotoId');
            $table->bigInteger('cartPhotoId');
            $table->bigInteger('carFormId');
            $table->bigInteger('insurancePhotoId');
            $table->bigInteger('vehicleAuthorizationId')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->text('reason')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('drivers');
    }
};
