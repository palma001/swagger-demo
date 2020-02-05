<?php

use Illuminate\Database\Seeder;

class CondominiumTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('condominiums')->insert([
        	[
        		'name' => 'Mangles 1',
        		'phone' => '04249502755',
        		'email' => 'mangles1@gmail.com',
        		'address' => 'Barcelona, mangles 1',
        		'active' => true,
        		'type_condominium_id' => 1,
        		'created_by' => 1
        	],
        	[
        		'name' => 'Casa bote 1',
        		'phone' => '04249502755',
        		'email' => 'casabote@gmail.com',
        		'address' => 'Lecheria',
        		'active' => true,
        		'type_condominium_id' => 2,
        		'created_by' => 1
        	]
        ]);
    }
}
