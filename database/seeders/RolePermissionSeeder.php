<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $permissions = [
            'view-courses',
            'create-courses',
            'update-courses',
            'delete-courses',
        ];

        foreach ($permissions as $permission) {
            Permission::create([
                'name' => $permission
            ]);
        };

        $teacherRole = Role::create([
            'name' => 'teacher'
        ]);

        $teacherRole->givePermissionTo([
            'view-courses',
            'create-courses',
            'update-courses',
            'delete-courses',
        ]);

        $studentRole = Role::create([
            'name' => 'student'
        ]);

        $studentRole->givePermissionTo([
            'view-courses'
        ]);

        //membuat super admin
        $user = User::create([
            'name' => 'Super Admin',
            'email' => 'super@ad.com',
            'password' => bcrypt('admin123')
        ]);

        $user->assignRole($teacherRole);
    }
}
