<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User; 
use Illuminate\Support\Facades\Hash;


class UserApiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Daftar izin
        $permissions = [
            "Lihat task",
            "Tambah task",
            "Ubah Task",
            "Hapus Task",
        ];

        // Membuat izin
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // Membuat role superadmin dan memberikan semua izin
        $role1 = Role::create(['name' => 'superadmin']);
        $role1->givePermissionTo(Permission::all());

        // Membuat role user dan memberikan izin "Lihat task"
        $role2 = Role::create(['name' => 'user']);
        $role2->givePermissionTo(['Lihat task']);

        // Membuat user superadmin
        $superman = User::create([
            "name" => "superman",
            "email" => "superman@gmail.com",
            "password" => Hash::make("superman123")
        ]);
        $superman->assignRole($role1);

        // Membuat user biasa
        $biasa = User::create([
            "name" => "Pak Djunaedi 2",
            "email" => "djuanedi@gmail.com",
            "password" => Hash::make("djuanedi123")
        ]);
        $biasa->assignRole($role2);
    }
}
