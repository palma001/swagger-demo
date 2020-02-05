<?php

use Illuminate\Database\Seeder;

class ModuleRolTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('module_rols')->insert([
        	[ 'module_id' => 1, 'rol_id' => 1, 'permissions' => "['1', '2', '3', '4', '5', '6']", 'created_by' => 1 ],
        	[ 'module_id' => 2, 'rol_id' => 1, 'permissions' => "['1', '2', '3', '4', '5', '6']", 'created_by' => 1 ],
        	[ 'module_id' => 3, 'rol_id' => 1, 'permissions' => "['1', '2', '3', '4', '5', '6']", 'created_by' => 1 ],
        	[ 'module_id' => 4, 'rol_id' => 1, 'permissions' => "['1', '2', '3', '4', '5', '6']", 'created_by' => 1 ],
        	[ 'module_id' => 1, 'rol_id' => 2, 'permissions' => "['1', '2', '3', '4', '5']", 'created_by' => 1 ],
        	[ 'module_id' => 2, 'rol_id' => 2, 'permissions' => "['1', '2', '3', '4', '5']", 'created_by' => 1 ],
        	[ 'module_id' => 3, 'rol_id' => 2, 'permissions' => "['1', '2', '3', '4', '5']", 'created_by' => 1 ],
        	[ 'module_id' => 4, 'rol_id' => 2, 'permissions' => "['1', '2', '3', '4', '5']", 'created_by' => 1 ]
        ]);
    }
}
