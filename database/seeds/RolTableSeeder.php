<?php

use Illuminate\Database\Seeder;

class RolTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rols')->insert([
        	[
        		'short_name' => 'ADM',
        		'name' => 'admin',
        		'created_by' => 1
        	],
        	[
        		'short_name' => 'SCT',
        		'name' => 'secretary',
        		'created_by' => 1
        	]
        ]);
    }
}
