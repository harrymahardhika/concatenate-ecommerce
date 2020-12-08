<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Support\Str;
use Tests\SetupFixtures;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use SetupFixtures;

    /**
     * @test
     */
    public function visit_dashboard_as_guest_redirects_to_login(): void
    {
        $this->get(route('dashboard'))->assertRedirect(route('login'));
    }

    /**
     * @test
     */
    public function administrator_can_login(): void
    {
        $password = Str::random();
        $administrator = User::factory()->create([
            'password' => $password,
        ]);

        $request = [
            'email' => $administrator->email,
            'password' => $password,
        ];

        $this->post(route('login'), $request)->assertRedirect(route('dashboard'));

        $this->assertAuthenticatedAs($administrator);
    }
}
