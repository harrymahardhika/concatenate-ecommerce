<?php

namespace Database\Seeders;

use App\Constants\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();

        DB::table('model_has_permissions')->truncate();

        $permissions = collect([
            // administrator management
            'manage-administrators' => [Role::ADMINISTRATOR],
            'browse-administrators' => [Role::ADMINISTRATOR],
            'read-administrator' => [Role::ADMINISTRATOR],
            'edit-administrator' => [Role::ADMINISTRATOR],
            'add-administrator' => [Role::ADMINISTRATOR],
            'delete-administrator' => [Role::ADMINISTRATOR],
        ]);

        $permissions->each(static function ($roles, $index) {
            $permission = Permission::firstOrCreate(
                ['name' => $index]
            );

            collect($roles)->each(static function ($userRole) use ($permission) {
                $role = \Spatie\Permission\Models\Role::where('name', $userRole)->first();
                $role->givePermissionTo($permission);
            });
        });

        Schema::enableForeignKeyConstraints();
    }
}
