<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DemoTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_demo()
    {
        $response = $this->get('/demo');
        $response->assertStatus(200);

        $response = $this->get('/searchByPostcode');
        $response->assertStatus(405);
    }
}
