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
        Schema::create('statistics', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('url', 2000);
            $table->string('ip', 15);
            $table->string('agent');
            $table->string('country');
            $table->string('region');
            $table->string('city');
            $table->string('loc');
            $table->timestamp('dt', $precision = 0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('statistics');
    }
};
