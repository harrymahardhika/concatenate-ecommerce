<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        User::truncate();

        $roles = Role::all();

        $roles->each(function ($role) {
            $user = User::factory()->create([
                'email' => strtolower($role->name) . '@example.com',
            ]);

            $user->assignRole($role);
        });
    }
}
