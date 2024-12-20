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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id");
            $table->string("title");
            $table->text("description");
            $table->string("address");
            $table->double("latitude");
            $table->double("longitude");
            $table->integer("rooms");
            $table->integer("beds");
            $table->integer("bathrooms");
            $table->integer("square_meters");
            $table->boolean("is_visible")->default(false);
            $table->text("thumb_url");
            $table->foreign("user_id")->references("id")->on("users");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};