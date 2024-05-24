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
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('title', 100);
            $table->string('keywords')->nullable();
            $table->string('description')->nullable();
            $table->string('email', 100)->nullable();
            $table->string('phone')->nullable();
            $table->string('facebook')->nullable();
            $table->string('address')->nullable();
            $table->string('image');
            $table->text('geolocation');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
