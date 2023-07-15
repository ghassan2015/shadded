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
        Schema::create('requests', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('userId');
            $table->bigInteger('driverId')->nullable();
            $table->bigInteger('serviceId');
            $table->double('price')->nullable();
            $table->longText('description');
//            $table->string('LoadingZone')->nullable();
//            $table->string('downloadZone')->nullable();
            $table->dateTime('date');
            $table->integer('commission')->default(0);
            $table->integer('numberWorker')->nullable();
            $table->integer('technicianRefrigeration')->nullable();
            $table->integer('reassembleAssemble')->nullable();
            $table->dateTime('completedAt')->nullable();
            $table->dateTime('cancelAt')->nullable();
            $table->dateTime('acceptAt')->nullable();
            $table->string('reason')->nullable();
            $table->double('distance')->nullable();
            $table->time('accessTime')->nullable();
            $table->time('startAt')->nullable();
            $table->time('endAt')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requests');
    }
};
