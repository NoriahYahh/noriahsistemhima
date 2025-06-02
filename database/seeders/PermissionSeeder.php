<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    public function run(): void
    {
        // Buat permission
        $permissions = [
            'daftar kepengurusan',
            'unduh',
            'admin melihat semua data hima',
            'create user',
            'unduh file',
            'verifikasi',
            'crud data hima',
        ];

        foreach ($permissions as $perm) {
            Permission::firstOrCreate(['name' => $perm]);
        }

        // // Role: user
        // $userRole = Role::firstOrCreate(['name' => 'user']);
        // $userRole->givePermissionTo(['daftar kepengurusan', 'unduh']);

        // Role: admin
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $adminRole->givePermissionTo([
            'admin melihat semua data hima',
            'create user',
            'unduh file',
            'verifikasi'
        ]);

        // Role: pengurus
        $pengurusRole = Role::firstOrCreate(['name' => 'pengurus']);
        $pengurusRole->givePermissionTo(['crud data hima']);

        // Assign role ke user
        $user1 = User::find(1);
        if ($user1) $user1->assignRole('pengurus');

        $user2 = User::find(2);
        if ($user2) $user2->assignRole('admin');

        $user3 = User::find(3);
        if ($user3) $user3->assignRole('pengurus');

        $user4 = User::find(4);
        if ($user4) $user4->assignRole('pengurus');
    }
}
