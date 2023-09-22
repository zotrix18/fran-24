<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role1 = Role::Create(['name' => 'Admin']);
        $role2 = Role::Create(['name' => 'Vendor']);

        Permission::create(['name' => 'dashAdmin'])->syncRoles([$role1]);
        Permission::create(['name' => 'vendedor'])->syncRoles([$role2]);
        
        
    }
}
