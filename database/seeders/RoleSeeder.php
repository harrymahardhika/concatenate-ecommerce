<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        Role::truncate();

        collect(\App\Constants\Role::all())->each(static function ($role, $index) {
            $r = new Role();

            $r->name = $index;
            $r->save();
        });
    }
}
