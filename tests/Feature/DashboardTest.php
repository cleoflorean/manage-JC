<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;

class DashboardTest extends TestCase
{
    public function test_dashboard_index_returns_ok()
    {
        $user = User::factory()->make();

        $response = $this->actingAs($user)->get(route('dashboard'));

        $response->assertStatus(200);
        $response->assertViewIs('dashboard');
        $response->assertViewHasAll(['totalStok', 'barangMasuk', 'barangKeluar', 'produkLowStock', 'barang']);
    }
}
