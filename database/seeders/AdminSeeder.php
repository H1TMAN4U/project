<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user=User::create([
            'name'=>'Admin',
            'email'=>'admin@gmail.com',
            'email_verified_at'=> now(),
            'password'=> bcrypt('adminpass')
        ]);
        $user->assignRole('Root');
        $adminRole = Role::where('name', 'Root')->first();
        $permissions = Permission::pluck('name');

        if ($adminRole && $permissions) {
            $adminRole->syncPermissions($permissions);
        }
    }
}
