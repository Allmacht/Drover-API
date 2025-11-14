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
        Schema::create('companies', function (Blueprint $table) {

            $table->ulid('id')->primary();
            $table->foreignUlid('owner_id')->constrained('users')->cascadeOnDelete();

            $table->string('name');
            $table->string('legal_name')->nullable();
            $table->string('slug')->unique();

            $table->string('tax_id', 100)->nullable();
            $table->enum('tax_id_type', ['RFC', 'RUC', 'CUIT', 'EIN', 'NIT', 'OTHER'])->nullable();
            $table->string('tax_regime', 100)->nullable();
            $table->enum('business_type', ['individual', 'corporation', 'llc', 'partnership', 'other'])->nullable();
            $table->string('registration_number', 100)->nullable();

            // SE CAMBIA A TABLA DE ADDRESSES Y SE AÑADE MARCADOR DE DEFAULT
            //
            // $table->foreignUlid('country_id')->constrained('countries')->cascadeOnDelete();
            // $table->string('state', 100)->nullable();
            // $table->string('city', 100)->nullable();
            // $table->string('postal_code', 20)->nullable();
            // $table->string('address_line_1')->nullable();
            // $table->string('address_line_2')->nullable();

            $table->string('website')->nullable();
            $table->string('billing_email')->nullable();
            $table->string('billing_phone', 50)->nullable();

            $table->enum('company_size', ['1-10', '11-50', '51-200', '201-500', '500+'])->nullable();
            $table->enum('status', ['active', 'suspended', 'cancelled', 'pending_setup'])->default('pending_setup');

            // SE CAMBIA A TABLA DE SUSCRIPTIONS Y DETALLES DE SUBSCRIPTIONS
            //
            // $table->enum('subscription_status', ['trial', 'active', 'past_due', 'cancelled', 'paused'])->default('trial');
            // $table->timestamp('trial_ends_at')->nullable();
            // $table->timestamp('subscription_started_at')->nullable();

            // $table->integer('max_users')->default(5);
            // $table->integer('max_warehouses')->default(1);
            // $table->integer('max_products')->default(1000);
            // $table->integer('max_monthly_orders')->default(500);
            // $table->integer('storage_limit_mb')->default(1024);

            $table->string('logo_url', 500)->nullable();
            $table->string('primary_color', 7)->nullable();
            $table->string('secondary_color', 7)->nullable();

            // SE CAMBIA A TABLA DE PAYMENTS_METHODS
            //
            // $table->enum('payment_provider', ['stripe', 'conekta', 'paypal', 'mercadopago'])->nullable();
            // $table->string('payment_provider_id')->nullable();
            // $table->string('payment_method_last4', 4)->nullable();
            // $table->enum('billing_cycle', ['monthly', 'yearly'])->default('monthly');
            // $table->timestamp('next_billing_date')->nullable();

            $table->json('settings')->nullable();
            $table->json('metadata')->nullable();

            $table->timestamps();

            $table->softDeletes();

            $table->foreignUlid('created_by_id')->constrained('users')->nullOnDelete();
            $table->foreignUlid('updated_by_id')->constrained('users')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
