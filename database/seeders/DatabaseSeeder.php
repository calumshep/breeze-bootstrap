<?php

namespace Database\Seeders;

use App\Models\Session;
use App\Models\Trainee;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;
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

        // In a development environment, add dummy users etc.
        if (App::environment('local')) {
            // Create Admin user with role, with up to 3 trainees
            $user = User::factory()
                ->has(Trainee::factory()->count(rand(0, 3)))
                ->create([
                'first_name'    => 'Admin',
                'last_name'     => 'User',
                'email'         => 'admin@example.com',
            ]);
            $user->assignRole('admin');

            // Create Coach user with role, with up to 3 trainees
            $user = User::factory()
                ->has(Trainee::factory()->count(rand(0, 3)))
                ->create([
                'first_name'    => 'Coach',
                'last_name'     => 'User',
                'email'         => 'coach@example.com',
            ]);
            $user->assignRole('coach');

            // Create basic user (no roles), with up to 3 trainees
            User::factory()
                ->has(Trainee::factory()->count(rand(0, 3)))
                ->create([
                'first_name'    => 'Basic',
                'last_name'     => 'User',
                'email'         => 'test@example.com',
            ]);

            // Make some dummy sessions
            Session::factory()
                ->count(10)
                ->create();
        }
    }
}
