<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_user = new Role();
        $role_user->name = 'Пользователь';
        $role_user->slug = 'user';
        $role_user->description = 'Обычный пользователь';
        $role_user->save();

        $role_admin = new Role();
        $role_admin->name = 'Администраторы';
        $role_admin->slug = 'admin';
        $role_admin->description = 'Администратор с полными правами';
        $role_admin->save();
    }
}
