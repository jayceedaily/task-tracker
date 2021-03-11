<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProjectTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testCreateProjectTest()
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        $response = $this->get('/api/project');

        $response->assertStatus(200);
    }
}
