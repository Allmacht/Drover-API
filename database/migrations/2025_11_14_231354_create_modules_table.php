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
        Schema::create('modules', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->string('name');
            $table->string('slug')->unique()->index();
            $table->string('description')->nullable();
            $table->string('short_description')->nullable();

            $table->enum('category', ['core', 'operations', 'sales', 'integrations', 'analytics', 'automation']);

            $table->boolean('is_required')->default(false);
            $table->boolean('is_active')->default(true)->index();
            $table->boolean('is_beta')->default(false);
            $table->integer('sort_order')->default(0);

            $table->json('requires_modules')->nullable();
            $table->json('conflicts_with')->nullable();

            $table->string('icon')->nullable();
            $table->string('color')->nullable();
            $table->string('banner_url')->nullable();

            $table->json('features')->nullable();

            // $table->string('documentation_url')->nullable();
            // $table->string('demo_url')->nullable();

            $table->json('metadata')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('modules');
    }
};
