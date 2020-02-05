<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
        	[
        		'name' => 'Ver Módulo',
        		'value' => 'viewAny',
        		'created_by' => 1
        	],
        	[
        		'name' => 'Crear Registro',
        		'value' => 'create',
        		'created_by' => 1
        	],
        	[
        		'name' => 'Ver Detalles de registro',
        		'value' => 'read',
        		'created_by' => 1
        	],
        	[
        		'name' => 'Modificar registro',
        		'value' => 'update',
        		'created_by' => 1
        	],
        	[
        		'name' => 'Restaurar registro',
        		'value' => 'restore',
        		'created_by' => 1
        	],
        	[
        		'name' => 'Eliminar registro',
        		'value' => 'delete',
        		'created_by' => 1
        	],
        	[
        		'name' => 'Eliminar registro, permanentemente',
        		'value' => 'forceDelete',
        		'created_by' => 1
        	]
        ]);
    }
}
