<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
class LaporanTest extends TestCase
{
    public function test_laporan_index_returns_ok()
    {
        // create a user instance (do not persist to DB) and act as that user
        $user = User::factory()->make();

        $response = $this->actingAs($user)->get(route('laporan.index'));

        $response->assertStatus(200);
        $response->assertViewIs('laporan');
        $response->assertViewHasAll(['laporan', 'startDate', 'endDate']);
    }
}
