<?php

namespace Database\Seeders;

use App\Models\Module;
use App\Models\ModulePricingRule;
use Illuminate\Database\Seeder;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $modules = [
            [
                'module' => [
                    'name' => 'Warehouse Management',
                    'slug' => 'warehouse',
                    'short_description' => 'Complete warehouse and inventory management',
                    'description' => 'Full-featured warehouse management including inventory control, stock movements, adjustments, and basic reporting.',
                    'category' => 'core',
                    'is_required' => true,
                    'is_active' => true,
                    'sort_order' => 1,
                    'icon' => 'warehouse',
                    'color' => '#3B82F6',
                    'features' => [
                        'Inventory management',
                        'Stock movements',
                        'Product catalog',
                        'Barcode support',
                        'Stock adjustments',
                        'Basic reports',
                    ],
                ],
                'pricing' => [
                    'base_price' => 50.00,
                    'pricing_type' => 'flat',
                    'billing_period' => 'monthly',
                    'pricing_config' => null,
                    'has_trial' => true,
                    'trial_days' => 14,
                    'trial_limits' => [
                        'max_products' => 100,
                        'max_warehouses' => 1,
                        'max_users' => 2,
                    ],
                    'yearly_discount_percentage' => 15.00,
                ],
            ],
            [
                'module' => [
                    'name' => 'Multi-Warehouse',
                    'slug' => 'multi_warehouse',
                    'short_description' => 'Manage multiple warehouses',
                    'description' => 'Extend your operations to multiple warehouse locations. Track inventory across locations, transfer stock between warehouses, and manage location-specific operations.',
                    'category' => 'operations',
                    'is_required' => false,
                    'is_active' => true,
                    'sort_order' => 2,
                    'icon' => 'building',
                    'color' => '#8B5CF6',
                    'requires_modules' => ['warehouse'],
                    'features' => [
                        'Unlimited warehouses',
                        'Inter-warehouse transfers',
                        'Location-specific inventory',
                        'Multi-location reporting',
                        'Warehouse-specific users',
                    ],
                ],
                'pricing' => [
                    'base_price' => 0,
                    'pricing_type' => 'per_unit',
                    'billing_period' => 'monthly',
                    'pricing_config' => [
                        'unit_name' => 'warehouse',
                        'unit_label' => 'Additional Warehouse',
                        'price_per_unit' => 20.00,
                        'min_units' => 1,
                        'max_units' => 50,
                        'included_units' => 0,  // Base module includes 1
                    ],
                    'has_trial' => true,
                    'trial_days' => 14,
                    'trial_limits' => [
                        'max_additional_warehouses' => 1,
                    ],
                    'yearly_discount_percentage' => 15.00,
                ],
            ],

            [
                'module' => [
                    'name' => 'Advanced Inventory',
                    'slug' => 'advanced_inventory',
                    'short_description' => 'Advanced inventory features',
                    'description' => 'Advanced inventory management with lot tracking, expiration dates, serial numbers, and cycle counting.',
                    'category' => 'operations',
                    'is_required' => false,
                    'is_active' => true,
                    'sort_order' => 3,
                    'icon' => 'package',
                    'color' => '#10B981',
                    'requires_modules' => ['warehouse'],
                    'features' => [
                        'Lot/Batch tracking',
                        'Serial number tracking',
                        'Expiration date management',
                        'FIFO/LIFO/FEFO',
                        'Cycle counting',
                        'Zone management',
                    ],
                ],
                'pricing' => [
                    'base_price' => 35.00,
                    'pricing_type' => 'flat',
                    'billing_period' => 'monthly',
                    'has_trial' => true,
                    'trial_days' => 14,
                    'yearly_discount_percentage' => 15.00,
                ],
            ],

            // ============================================
            // SALES MODULES
            // ============================================
            [
                'module' => [
                    'name' => 'Point of Sale (POS)',
                    'slug' => 'pos',
                    'short_description' => 'Complete POS system',
                    'description' => 'Full-featured point of sale system with inventory integration, multiple payment methods, and sales reporting.',
                    'category' => 'sales',
                    'is_required' => false,
                    'is_active' => true,
                    'sort_order' => 10,
                    'icon' => 'cash-register',
                    'color' => '#F59E0B',
                    'requires_modules' => ['warehouse'],
                    'features' => [
                        'Touch-optimized interface',
                        'Multiple payment methods',
                        'Real-time inventory sync',
                        'Receipt printing',
                        'Customer management',
                        'Sales reports',
                    ],
                ],
                'pricing' => [
                    'base_price' => 40.00,
                    'pricing_type' => 'per_unit',
                    'billing_period' => 'monthly',
                    'pricing_config' => [
                        'unit_name' => 'terminal',
                        'unit_label' => 'POS Terminal',
                        'price_per_unit' => 10.00,
                        'min_units' => 1,
                        'max_units' => 20,
                        'included_units' => 1,
                    ],
                    'has_trial' => true,
                    'trial_days' => 14,
                    'yearly_discount_percentage' => 15.00,
                ],
            ],

            // ============================================
            // SHIPPING & LOGISTICS
            // ============================================
            [
                'module' => [
                    'name' => 'Shipping & Guides',
                    'slug' => 'shipping',
                    'short_description' => 'Shipping label generation',
                    'description' => 'Generate shipping labels and tracking for multiple carriers. Automated shipping workflows and carrier integration.',
                    'category' => 'operations',
                    'is_required' => false,
                    'is_active' => true,
                    'sort_order' => 5,
                    'icon' => 'truck',
                    'color' => '#EF4444',
                    'requires_modules' => ['warehouse'],
                    'features' => [
                        'Multi-carrier support',
                        'Automatic label generation',
                        'Tracking integration',
                        'Shipping rules',
                        'Rate shopping',
                        'Batch processing',
                    ],
                ],
                'pricing' => [
                    'base_price' => 25.00,
                    'pricing_type' => 'usage_based',
                    'billing_period' => 'monthly',
                    'pricing_config' => [
                        'unit_name' => 'shipping_guide',
                        'unit_label' => 'Shipping Guide',
                        'price_per_unit' => 0.50,
                        'included_units' => 100,
                        'overage_price_per_unit' => 0.50,
                        'overage_billing' => 'monthly',
                        'soft_limit' => 500,
                        'hard_limit' => 1000,
                        'billing_frequency' => 'monthly',
                    ],
                    'has_trial' => true,
                    'trial_days' => 14,
                    'trial_limits' => [
                        'max_guides' => 50,
                    ],
                    'yearly_discount_percentage' => 15.00,
                ],
            ],

            // ============================================
            // INTEGRATIONS
            // ============================================
            [
                'module' => [
                    'name' => 'Marketplace Integrations',
                    'slug' => 'marketplace_integrations',
                    'short_description' => 'Connect with marketplaces',
                    'description' => 'Integrate with major marketplaces like Amazon, MercadoLibre, Shopify, and more. Sync inventory, orders, and products automatically.',
                    'category' => 'integrations',
                    'is_required' => false,
                    'is_active' => true,
                    'sort_order' => 20,
                    'icon' => 'plug',
                    'color' => '#6366F1',
                    'requires_modules' => ['warehouse'],
                    'features' => [
                        'Amazon integration',
                        'MercadoLibre integration',
                        'Shopify integration',
                        'WooCommerce integration',
                        'Auto inventory sync',
                        'Order import',
                        'Product mapping',
                    ],
                ],
                'pricing' => [
                    'base_price' => 30.00,
                    'pricing_type' => 'tiered',
                    'billing_period' => 'monthly',
                    'pricing_config' => [
                        'unit_name' => 'connector',
                        'unit_label' => 'Active Connector',
                        'tiers' => [
                            ['from' => 1, 'to' => 2, 'price_per_unit' => 15.00],
                            ['from' => 3, 'to' => 5, 'price_per_unit' => 12.00],
                            ['from' => 6, 'to' => null, 'price_per_unit' => 10.00],
                        ],
                    ],
                    'has_trial' => true,
                    'trial_days' => 14,
                    'trial_limits' => [
                        'max_connectors' => 1,
                        'sync_frequency' => 'daily',
                    ],
                    'yearly_discount_percentage' => 15.00,
                ],
            ],

            [
                'module' => [
                    'name' => 'API Access',
                    'slug' => 'api_access',
                    'short_description' => 'RESTful API access',
                    'description' => 'Full API access to integrate your WMS with custom applications, ERPs, or external systems.',
                    'category' => 'integrations',
                    'is_required' => false,
                    'is_active' => true,
                    'sort_order' => 21,
                    'icon' => 'code',
                    'color' => '#14B8A6',
                    'features' => [
                        'RESTful API',
                        'Webhooks',
                        'API documentation',
                        'Rate limiting',
                        'API keys management',
                    ],
                ],
                'pricing' => [
                    'base_price' => 50.00,
                    'pricing_type' => 'flat',
                    'billing_period' => 'monthly',
                    'has_trial' => true,
                    'trial_days' => 14,
                    'trial_limits' => [
                        'api_calls_per_month' => 1000,
                    ],
                    'yearly_discount_percentage' => 15.00,
                ],
            ],

            // ============================================
            // ANALYTICS & REPORTING
            // ============================================
            [
                'module' => [
                    'name' => 'Advanced Reports',
                    'slug' => 'advanced_reports',
                    'short_description' => 'Advanced analytics and reports',
                    'description' => 'Comprehensive reporting suite with custom reports, dashboards, and data exports.',
                    'category' => 'analytics',
                    'is_required' => false,
                    'is_active' => true,
                    'sort_order' => 30,
                    'icon' => 'chart-bar',
                    'color' => '#EC4899',
                    'requires_modules' => ['warehouse'],
                    'features' => [
                        'Custom dashboards',
                        'Scheduled reports',
                        'Export to Excel/PDF',
                        'Real-time analytics',
                        'KPI tracking',
                        'Inventory forecasting',
                    ],
                ],
                'pricing' => [
                    'base_price' => 35.00,
                    'pricing_type' => 'flat',
                    'billing_period' => 'monthly',
                    'has_trial' => true,
                    'trial_days' => 14,
                    'yearly_discount_percentage' => 15.00,
                ],
            ],

            // ============================================
            // AUTOMATION
            // ============================================
            [
                'module' => [
                    'name' => 'Workflow Automation',
                    'slug' => 'automation',
                    'short_description' => 'Automate repetitive tasks',
                    'description' => 'Create automated workflows for orders, inventory, notifications, and more. No-code workflow builder.',
                    'category' => 'automation',
                    'is_required' => false,
                    'is_active' => true,
                    'is_beta' => true,
                    'sort_order' => 40,
                    'icon' => 'robot',
                    'color' => '#8B5CF6',
                    'requires_modules' => ['warehouse'],
                    'features' => [
                        'No-code workflow builder',
                        'Trigger-based automation',
                        'Email notifications',
                        'SMS notifications',
                        'Inventory alerts',
                        'Custom rules',
                    ],
                ],
                'pricing' => [
                    'base_price' => 45.00,
                    'pricing_type' => 'flat',
                    'billing_period' => 'monthly',
                    'has_trial' => true,
                    'trial_days' => 14,
                    'trial_limits' => [
                        'max_workflows' => 5,
                    ],
                    'yearly_discount_percentage' => 15.00,
                ],
            ],
        ];

        foreach ($modules as $data) {
            $module = Module::create($data['module']);

            $pricingData = $data['pricing'];
            $pricingData['module_id'] = $module->id;

            ModulePricingRule::create($pricingData);
        }
    }
}
