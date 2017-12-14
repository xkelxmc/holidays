<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_user = Role::create(['name' => 'user']);
        $role_admin = Role::create(['name' => 'admin']);
        $role_company = Role::create(['name' => 'company']);

//        $permission = Permission::create(['name' => 'edit articles']);
    }
}
