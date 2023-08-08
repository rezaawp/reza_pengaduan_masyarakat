<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'menulis laporan pengaduan']);
        Permission::create(['name' => 'verifikasi dan validasi']);
        Permission::create(['name' => 'memberikan tanggapan']);
        Permission::create(['name' => 'generate laporan']);

        // create roles and assign existing permissions
        $role1 = Role::create(['name' => 'admin']);
        $role1->givePermissionTo('verifikasi dan validasi');
        $role1->givePermissionTo('memberikan tanggapan');
        $role1->givePermissionTo('menulis laporan pengaduan');

        $role2 = Role::create(['name' => 'petugas']);
        $role2->givePermissionTo('verifikasi dan validasi');
        $role2->givePermissionTo('memberikan tanggapan');

        $role3 = Role::create(['name' => 'masyarakat']);
        $role3->givePermissionTo('menulis laporan pengaduan');
        // gets all permissions via Gate::before rule; see AuthServiceProvider

        // create demo users
        $user = \App\Models\User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
        ]);

        $user->assignRole($role1);

        $user = \App\Models\User::factory()->create([
            'name' => 'Petugas User',
            'email' => 'petugas@example.com',
        ]);

        $user->assignRole($role2);

        $user = \App\Models\User::factory()->create([
            'name' => 'Example Super-Admin User',
            'email' => 'masyarakat@example.com',
        ]);

        $user->assignRole($role3);
    }
}
