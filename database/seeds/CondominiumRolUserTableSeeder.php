<?php

use Illuminate\Database\Seeder;

class CondominiumRolUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('condominium_rol_users')->insert([
        	[
        		'rol_id' => 1,
        		'user_id' => 2,
        		'condominium_id' => 1,
        		'created_by' => 1
        	],
        	[
        		'rol_id' => 2,
        		'user_id' => 2,
        		'condominium_id' => 2,
        		'created_by' => 1
        	]
        ]);
    }
}
