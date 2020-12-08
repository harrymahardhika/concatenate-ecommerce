<?php

namespace Tests;

use App\Constants\Role;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

trait SetupFixtures
{
    use RefreshDatabase;

    protected $administrator;

    protected function setUp(): void
    {
        parent::setUp();

        $this->artisan('db:seed');

        $this->administrator = User::role(Role::ADMINISTRATOR)->first();
    }
}
