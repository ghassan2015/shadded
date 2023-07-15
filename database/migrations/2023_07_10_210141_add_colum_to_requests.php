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
        Schema::table('requests', function (Blueprint $table) {
            $table->string('startLatitude');
            $table->string('endLatitude');
            $table->string('startLongitude');
            $table->string('endLongitude');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('requests', function (Blueprint $table) {
            $table->dropColumn('startLatitude');
            $table->dropColumn('endLatitude');
            $table->dropColumn('startLongitude');
            $table->dropColumn('endLongitude');


        });
    }
};
