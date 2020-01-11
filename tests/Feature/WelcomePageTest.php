<?php

namespace Tests\Feature;

use Tests\TestCase;

class WelcomePageTest extends TestCase
{
    /** @test */
    public function testWelcomePage()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
