<?php

namespace Tests\Feature\Contexts\Module;

use App\Models\Module;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GetModulesTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_returns_list_of_modules()
    {
        $module = Module::create([
            'name' => 'Test Module',
            'slug' => 'test-module',
            'description' => 'A test module',
            'short_description' => 'Test',
            'category' => 'core',
            'is_required' => true,
            'is_active' => true,
            'sort_order' => 1,
            'icon' => 'test-icon',
            'color' => '#000000',
            'banner_url' => 'http://example.com/banner.jpg',
            'features' => ['feature1'],
            'metadata' => ['key' => 'value'],
        ]);

        $response = $this->getJson(route('modules.index'));

        $response->assertOk()
            ->assertJsonCount(1, 'data')
            ->assertJsonFragment([
                'id' => $module->id,
                'name' => 'Test Module',
                'slug' => 'test-module',
            ]);
    }
}
