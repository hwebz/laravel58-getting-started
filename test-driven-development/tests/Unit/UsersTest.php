<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

// php artisan make:test UsersTest --unit
class UsersTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_user_can_have_a_team()
    {
        $user = factory('App\User')->create();

        $user->team()->create(['name' => 'hwebz']);

        $this->assertEquals('hwebz', $user->team->name);
    }
}
