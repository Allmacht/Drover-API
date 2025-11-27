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
        Schema::create('company_members', function (Blueprint $table) {
            $table->ulid('id')->primary();

            $table->foreignUlid('company_id')->constrained('companies')->cascadeOnDelete();
            $table->foreignUlid('user_id')->constrained('users')->cascadeOnDelete();

            $table->foreignUlid('role_id')->constrained('roles')->cascadeOnDelete();

            $table->enum('status', ['active', 'inactive', 'pending_approval'])->default('pending_approval');

            $table->json('permission')->nullable();

            $table->foreignUlid('invited_by_id')->constrained('users')->cascadeOnDelete();
            $table->timestamp('joined_at')->nullable();
            $table->timestamps();

            $table->unique(['company_id', 'user_id']);
            $table->index(['user_id', 'status']);
            $table->index('company_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company_members');
    }
};
