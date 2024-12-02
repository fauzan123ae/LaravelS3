<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;


class SeederUserApi extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Create permissions
        $permissions = [
            'Lihat Task',
            'Buat Task',
            'Ubah Task',
            'Hapus Task',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        
        $role1 = Role::create(['name' => 'superadmin']);
        $role1->givePermissionTo(Permission::all()); 

        $role2 = Role::create(['name' => 'user']);
        $role2->givePermissionTo(['Lihat Task']); 

        
        $superman = User::create([
            "name" => "superman",
            "email" => "superman@gmail.com",
            "password" => HASH::make("superman123")
        ]);
        $superman->assignRole($role1);

        $orang_biasa = User::create([
            "name" => "orang",
            "email" => "orang@gmail.com",
            "password" => HASH::make("orang123")
        ]);
        $orang_biasa->assignRole($role2); 
    }
}
