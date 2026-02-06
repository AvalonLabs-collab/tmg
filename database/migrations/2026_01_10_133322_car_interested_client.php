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
        Schema::create('car_interested_client', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vehicle_id')->constrained('vehicles')->cascadeOnDelete();
            $table->foreignId('interested_client_id')->constrained('interest_clients')->cascadeOnDelete();
            // Extra metadata (VERY useful)
            $table->string('profile')->nullable(); // XLE
            $table->timestamp('interested_at')->nullable();
            $table->unique(['vehicle_id', 'interested_client_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('car_interested_client');
    }
};
