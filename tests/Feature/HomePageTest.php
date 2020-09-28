<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HomePageTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function testHomePage()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->get('/home');

        $response->assertStatus(200);
    }
}
