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
        Schema::create('module_pricing_rules', function (Blueprint $table) {
            $table->ulid('id')->primary()->index();
            $table->foreignUlid('module_id')->constrained('modules')->index('billing_period')->cascadeOnDelete();

            $table->decimal('base_price', 10, 2)->default(0);
            $table->char('currency', 3)->default('USD');

            $table->enum('pricing_type', ['flat', 'per_unit', 'tiered', 'usage_based', 'hybrid', 'subscription', 'custom']);
            $table->enum('billing_period', ['monthly', 'yearly'])->default('monthly');

            $table->json('pricing_config')->nullable();

            /* Example for per_unit:
            {
                "unit_name": "warehouse",
                "unit_label": "Additional Warehouse",
                "price_per_unit": 20.00,
                "min_units": 1,
                "max_units": 50,
                "included_units": 1
            }
            */

            /* Example for tiered:
            {
                "unit_name": "connectors",
                "tiers": [
                    {"from": 1, "to": 2, "price_per_unit": 15.00},
                    {"from": 3, "to": 5, "price_per_unit": 12.00},
                    {"from": 6, "to": null, "price_per_unit": 10.00}
                ]
            }
            */

            /* Example for usage_based:
            {
                "unit_name": "shipping_guides",
                "price_per_unit": 0.50,
                "included_units": 100,
                "billing_frequency": "monthly"
            }
            */

            $table->boolean('has_trial')->default(true);
            $table->integer('trial_days')->default(14);

            $table->json('trial_limits')->nullable();

            /* Example for trial_limits:
            {
                "max_warehouses": 1,
                "max_orders": 2,
                "max_products": 100
            }
            */

            $table->decimal('yearly_discount_percentage', 5, 2)->default(0);

            $table->boolean('is_active')->default(true)->index('billing_period');
            $table->date('valid_from')->nullable();
            $table->date('valid_until')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('module_pricing_rules');
    }
};
