<?php

use Illuminate\Database\Seeder;

class CondominiumTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('condominium_types')->insert([
			[
				'name' => 'Tipo A',
				'description' => 'Este tipo de condominio sería un edificio de departamentos u oficinas en donde el terreno es común',
				'created_by' => 1
			],
			[
				'name' => 'Tipo B',
				'description' => 'Un condominio de viviendas, donde las casas son de dominio exclusivo, pero las calles y la plaza son comunes',
				'created_by' => 1
			]
		]);
    }
}
