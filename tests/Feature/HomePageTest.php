<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HomePageTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function testHomePage()
    {
        $user = factory(\App\User::class)->create();

        $response = $this->actingAs($user)
            ->get('/home');

        $response->assertStatus(200);
    }
}
