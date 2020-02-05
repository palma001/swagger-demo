<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [
                [
                    'username' => 'root',
                    'email' => 'palmaluis1997@gmail.com',
                    'password' => Hash::make('123456'),
                    'active' => true,
                    'created_by' => 1
                ],
                [
                    'username' => 'admin',
                    'email' => 'orix@gmail.com',
                    'password' => Hash::make('123456'),
                    'active' => true,
                    'created_by' => 1
                ]
            ]
        );
    }
}
