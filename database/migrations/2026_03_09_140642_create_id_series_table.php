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
        Schema::create('id_series', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique(); // e.g., USR, TEN, STR, WHS, SUB
            $table->bigInteger('series_value')->default(0); // incremented value
            $table->timestamps();

            $table->index('code');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('id_series');
    }
};
