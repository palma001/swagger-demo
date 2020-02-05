<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UsersTableSeeder::class,
            CondominiumTypeTableSeeder::class,
            CondominiumTableSeeder::class,
            ModuleTableSeeder::class,
            RolTableSeeder::class,
            PermissionTableSeeder::class,
            ModulePermissionTableSeeder::class,
            ModuleRolTableSeeder::class,
            CondominiumRolUserTableSeeder::class
        ]);
    }
}
