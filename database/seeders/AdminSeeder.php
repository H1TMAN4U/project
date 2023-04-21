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
        $user->assignRole('Admin');
        $role = Role::findByName('Admin');
        $permission = Permission::findByName('Publish');
        $role->givePermissionTo($permission);

        if ($user->hasPermissionTo('Publish')) {
            echo "Permission assigned to user successfully!";
        }


    }
}
