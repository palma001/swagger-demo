<?php

use Illuminate\Database\Seeder;

class ModulePermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('module_permissions')->insert([
        	[ 'module_id' => 1, 'permission_id' => 1, 'created_by' => 1 ],
        	[ 'module_id' => 1, 'permission_id' => 2, 'created_by' => 1 ],
        	[ 'module_id' => 1, 'permission_id' => 3, 'created_by' => 1 ],
        	[ 'module_id' => 1, 'permission_id' => 4, 'created_by' => 1 ],
        	[ 'module_id' => 1, 'permission_id' => 5, 'created_by' => 1 ],
        	[ 'module_id' => 1, 'permission_id' => 6, 'created_by' => 1 ],
        	[ 'module_id' => 2, 'permission_id' => 1, 'created_by' => 1 ],
        	[ 'module_id' => 2, 'permission_id' => 2, 'created_by' => 1 ],
        	[ 'module_id' => 2, 'permission_id' => 3, 'created_by' => 1 ],
        	[ 'module_id' => 2, 'permission_id' => 4, 'created_by' => 1 ],
        	[ 'module_id' => 2, 'permission_id' => 5, 'created_by' => 1 ],
        	[ 'module_id' => 2, 'permission_id' => 6, 'created_by' => 1 ],
        	[ 'module_id' => 3, 'permission_id' => 1, 'created_by' => 1 ],
        	[ 'module_id' => 3, 'permission_id' => 2, 'created_by' => 1 ],
        	[ 'module_id' => 3, 'permission_id' => 3, 'created_by' => 1 ],
        	[ 'module_id' => 3, 'permission_id' => 4, 'created_by' => 1 ],
        	[ 'module_id' => 3, 'permission_id' => 5, 'created_by' => 1 ],
        	[ 'module_id' => 3, 'permission_id' => 6, 'created_by' => 1 ],
        	[ 'module_id' => 4, 'permission_id' => 1, 'created_by' => 1 ],
        	[ 'module_id' => 4, 'permission_id' => 2, 'created_by' => 1 ],
        	[ 'module_id' => 4, 'permission_id' => 3, 'created_by' => 1 ],
        	[ 'module_id' => 4, 'permission_id' => 4, 'created_by' => 1 ],
        	[ 'module_id' => 4, 'permission_id' => 5, 'created_by' => 1 ],
        	[ 'module_id' => 4, 'permission_id' => 6, 'created_by' => 1 ]
        ]);
    }
}
