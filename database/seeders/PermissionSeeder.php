<?php

namespace Database\Seeders;

use App\Models\DataUser;
use App\Models\Masyarakat;
use App\Models\Petugas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Psy\Readline\Hoa\Console;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;
use Symfony\Component\Console\Output\ConsoleOutput;

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
        $role1->givePermissionTo('generate laporan');

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
            'is_done' => true
        ]);

        Petugas::create([
            'telp' => '08571231231',
            'level' => 'admin',
            'user_id' => $user->id
        ]);

        $user->assignRole($role1);

        $user = \App\Models\User::factory()->create([
            'name' => 'Petugas User',
            'email' => 'petugas@example.com',
            'is_done' => true
        ]);

        Petugas::create([
            'telp' => '08571231231',
            'level' => 'petugas',
            'user_id' => $user->id
        ]);

        $user->assignRole($role2);

        $user = \App\Models\User::factory()->create([
            'name' => 'Masyarakat User',
            'email' => 'masyarakat@example.com',
            'is_done' => true
        ]);

        $masy = new Masyarakat();

        $masyarakat = Masyarakat::create([
            'nik' => '1234567890123456',
            'nama' => 'Reza Khoirul Wijaya Putra',
            'username' => 'rezawp',
            'telp' => '081512341234',
            'user_id' => $user->id
        ]);

        $masyarakatId = $masyarakat->id;

        DataUser::create([
            'from_table' => $masy->getTable(),
            'identity_id' => $masyarakatId,
            'user_id' => $user->id
        ]);

        $user->assignRole($role3);
    }
}
