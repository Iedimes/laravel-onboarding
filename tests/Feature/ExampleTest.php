<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_greeting_route_returns_success(): void
    {
        $response = $this->getJson('/api/greeting');

        $response->assertStatus(200)
            ->assertJson([
                'status' => 'success',
                'message' => '¡Hola! Laravel está funcionando correctamente.',
            ]);
    }
}

