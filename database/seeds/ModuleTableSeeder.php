<?php

use Illuminate\Database\Seeder;

class ModuleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('modules')->insert([
        	[
        		'short_name' => 'USR',
        		'name' => 'users',
        		'created_by' => 1
        	],
        	[
        		'short_name' => 'MDL',
        		'name' => 'modules',
        		'created_by' => 1
        	],
        	[
        		'short_name' => 'PMS',
        		'name' => 'permission',
        		'created_by' => 1
        	],
        	[
        		'short_name' => 'ROL',
        		'name' => 'roles',
        		'created_by' => 1
        	]
        ]);
    }
}
