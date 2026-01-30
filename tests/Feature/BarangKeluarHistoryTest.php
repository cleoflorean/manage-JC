<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;

class BarangKeluarHistoryTest extends TestCase
{
    public function test_keluar_history_page_renders()
    {
        $user = User::factory()->make();
        $response = $this->actingAs($user)->get(route('barang.keluar.history'));

        $response->assertStatus(200);
        $response->assertViewIs('produk_riwayat');
        $response->assertViewHasAll(['riwayat', 'startDate', 'endDate']);
    }

    public function test_keluar_export_redirects_when_table_missing()
    {
        $user = User::factory()->make();
        $response = $this->actingAs($user)->get(route('barang.keluar.export'));
        $response->assertRedirect();
    }
}
