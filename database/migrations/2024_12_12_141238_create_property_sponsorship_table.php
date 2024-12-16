<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('property_sponsorship', function (Blueprint $table) {

            $table->foreignId('property_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('sponsorship_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->dateTime('end_date')->default('2025-12-12 00:00:00');

            $table->primary(['property_id', 'sponsorship_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('property_sponsorship');
    }
};