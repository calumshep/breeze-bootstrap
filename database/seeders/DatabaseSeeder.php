<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $admin_perms = [
            'manage credit products',
            'see user details',
            'manage permissions',
            'manage training sessions',
            'manage credit cost',
            'set cancellation policy',
            'cancel sessions',
            'allocate coaches'
        ];

        $coach_perms = [
            'list users',
            'manage availability'
        ];

        // Iterate through permission names and create the instance for each
        foreach (array_merge($admin_perms, $coach_perms) as $permission) {
            Permission::create(['name' => $permission]);
        }

        // Create roles for permission grouping
        $role = Role::create(['name' => 'admin']);
        $role->syncPermissions($admin_perms);
        $role = Role::create(['name' => 'coach']);
        $role->syncPermissions($coach_perms);

        // Create Admin user with role
        $user = User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
        ]);
        $user->assignRole('admin');

        // Create Coach user with role
        $user = User::factory()->create([
            'name' => 'Coach User',
            'email' => 'coach@example.com',
        ]);
        $user->assignRole('coach');

        // Create basic user (no roles)
        User::factory()->create([
            'name' => 'Basic User',
            'email' => 'test@example.com',
        ]);
    }
}
