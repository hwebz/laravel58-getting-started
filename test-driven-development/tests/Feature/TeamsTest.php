<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TeamsTest extends TestCase
{
    use RefreshDatabase; // reset each time tests change datbase, db will not be changed

    /** @test */
    public function a_user_can_create_a_team()
    {
        $this->withoutExceptionHandling();

        // Given I am a user who is logged in
        $this->actingAs(factory('App\User')->create());

        $attributes = ['name' => 'hwebz'];

        // When they hit the endpoint /teams to create a new team, while passing the necessary data.
        $this->post('/teams', $attributes);

        // Then there should be a new in the database.
        $this->assertDatabaseHas('teams', $attributes);
    }

    /** @test */
    public function guests_may_not_create_teams() {
        // $this->withoutExceptionHandling();

        $this->post('/teams')->assertRedirect('/login');
    }
}
