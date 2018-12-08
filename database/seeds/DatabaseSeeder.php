<?php

use Illuminate\Database\Seeder;
use App\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call('RoleSeeder');
    }
}

class RoleSeeder extends Seeder {
    public function run()
    {
        (new Role())->fill([
           'name' => 'Админ'
        ]);
        (new Role())->fill([
            'name' => 'Пользователь'
        ]);
    }
}
