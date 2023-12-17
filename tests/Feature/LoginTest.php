<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function test_user_can_view_a_login_form()
    {

        $response = $this->get('author/login');

        $response->assertSuccessful();
        $response->assertViewIs('author.login');
    }
}

