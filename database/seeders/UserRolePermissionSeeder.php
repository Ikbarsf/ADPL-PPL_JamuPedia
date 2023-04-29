<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserRolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $default_user_value = [
            'email_verified_at' => now(),
            'alamat' => 'jember',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];


            $admin = User::create(array_merge([
                'email' => 'admin@mail.com', 
                'name' => 'admin',
            ], $default_user_value));
    
            
            $mitra = User::create(array_merge([
                'email' => 'mitra@mail.com', 
                'name' => 'mitra',
            ], $default_user_value));

            $customer = User::create(array_merge([
                'email' => 'customer@mail.com', 
                'name' => 'customer',
            ], $default_user_value));
    
    
            $role_admin = Role::create(['name' => 'admin']);
            $role_mitra = Role::create(['name' => 'mitra']);
            $role_customer = Role::create(['name' => 'customer']);

            Permission::create(['name' => 'admin']);
            Permission::create(['name' => 'mitra']);
            Permission::create(['name' => 'customer']);
    
            $role_admin->givePermissionTo('admin');
            $role_mitra->givePermissionTo('mitra');
            $role_customer->givePermissionTo('customer');

            $admin->assignRole('admin');
            $mitra->assignRole('mitra');
            $customer->assignRole('customer');

    }
}
