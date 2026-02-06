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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('make')->nullable(); // Toyota
            $table->string('model')->nullable(); // Camry
            $table->integer('year')->nullable(); // 2018
            $table->json('other_specs')->nullable(); // e.g. trim levels, packages
            $table->json('extra_specs')->nullable();
            $table->string('import_origin')->nullable(); // XLE
            $table->string('profile')->nullable(); // XLE
            $table->boolean('price_negociable')->default(false);
            $table->json('price_breakdown')->nullable(); // e.g. downpayment, monthly installment
            $table->decimal('price', 12, 2)->nullable(); // 25000.00
            $table->enum('status', ['available', 'reserved', 'sold'])->default('available');
            // Usage & condition
            $table->unsignedInteger('mileage')->nullable();
            $table->enum('condition', ['new', 'used', 'foreign_used'])->nullable();
            // Specs (human-usable, not brochure noise)
            $table->enum('transmission', ['automatic', 'manual'])->nullable();
            $table->enum('fuel_type', ['petrol', 'diesel', 'hybrid', 'electric'])->nullable();
            $table->string('engine')->nullable(); // e.g. 2.5L
            $table->unsignedTinyInteger('doors')->nullable();
            // Visuals
            $table->json('images')->nullable();
            $table->string('video_url')->nullable();
            // Content
            $table->text('description')->nullable();
            $table->string('currency')->default('NGN');
            $table->decimal('price_sold_at')->nullable();
            $table->timestamp('sold_at')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->timestamp('published_at')->nullable()->useCurrent();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
