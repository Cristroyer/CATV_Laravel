<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Permisos de usuarios
        Permission::create([
        	'name'		   =>'Navegar usuarios',
        	'slug'		   =>'users.index',
        	'description'  =>'Lista y navega todos los usuarios del sistema',
        ]);
        Permission::create([
        	'name'		   =>'Crear usuario',
        	'slug'		   =>'users.create',
        	'description'  =>'Crea usuario/s en el sistema',
        ]);
        Permission::create([
        	'name'		   =>'Ver detalle de usuarios',
        	'slug'		   =>'users.show',
        	'description'  =>'Ver en detalle cada usuario del sistema',
        ]);
        Permission::create([
        	'name'		   =>'Edicion de usuario',
        	'slug'		   =>'users.edit',
        	'description'  =>'Editar cualquier usuario del sistema',
        ]);
        Permission::create([
        	'name'		   =>'Eliminar usuario',
        	'slug'		   =>'users.destroy',
        	'description'  =>'Eliminar cualquier usuario del sistema',
        ]);


        //Roles de usuarios
        Permission::create([
        	'name'		   =>'Navegar roles',
        	'slug'		   =>'roles.index',
        	'description'  =>'Lista y navega todos los roles del sistema',
        ]);
        Permission::create([
        	'name'		   =>'Crear roles',
        	'slug'		   =>'roles.create',
        	'description'  =>'Crea rol/es en el sistema',
        ]);
        Permission::create([
        	'name'		   =>'Ver detalle de roles',
        	'slug'		   =>'roles.show',
        	'description'  =>'Ver en detalle cada rol del sistema',
        ]);
        Permission::create([
        	'name'		   =>'Edicion de roles',
        	'slug'		   =>'roles.edit',
        	'description'  =>'Editar cualquier rol del sistema',
        ]);
        Permission::create([
        	'name'		   =>'Eliminar roles',
        	'slug'		   =>'roles.destroy',
        	'description'  =>'Eliminar cualquier rol del sistema',
        ]);

        //Permisos para datos de usuarios
        Permission::create([
        	'name'		   =>'Navegar datos de usuarios',
        	'slug'		   =>'userDatas.index',
        	'description'  =>'Lista y navega todos los datos de usuarios del sistema',
        ]);
        Permission::create([
        	'name'		   =>'Crear datos de usuarios',
        	'slug'		   =>'userDatas.create',
        	'description'  =>'Crea datos de usuarios en el sistema',
        ]);
        Permission::create([
        	'name'		   =>'Ver detalle de datos de usuarios',
        	'slug'		   =>'userDatas.show',
        	'description'  =>'Ver en detalle cada datos de usuarios del sistema',
        ]);
        Permission::create([
        	'name'		   =>'Edicion de datos de usuarios',
        	'slug'		   =>'userDatas.edit',
        	'description'  =>'Editar cualquier datos de usuarios del sistema',
        ]);
        Permission::create([
        	'name'		   =>'Eliminar datos de usuarios',
        	'slug'		   =>'userDatas.destroy',
        	'description'  =>'Eliminar cualquier datos de usuarios del sistema',
        ]);

        //Permisos para puntos de usuarios
        Permission::create([
            'name'         =>'Navegar puntos de usuarios',
            'slug'         =>'userPoints.index',
            'description'  =>'Lista y navega todos los puntos de usuarios del sistema',
        ]);
        Permission::create([
            'name'         =>'Crear puntos de usuarios',
            'slug'         =>'userPoints.create',
            'description'  =>'Crea puntos de usuarios en el sistema',
        ]);
        Permission::create([
            'name'         =>'Ver detalle de puntos de usuarios',
            'slug'         =>'userPoints.show',
            'description'  =>'Ver en detalle cada puntos de usuarios del sistema',
        ]);
        Permission::create([
            'name'         =>'Edicion de puntos de usuarios',
            'slug'         =>'userPoints.edit',
            'description'  =>'Editar cualquier puntos de usuarios del sistema',
        ]);
        Permission::create([
            'name'         =>'Eliminar puntos de usuarios',
            'slug'         =>'userPoints.destroy',
            'description'  =>'Eliminar cualquier puntos de usuarios del sistema',
        ]);


        //Imports Excel
        Permission::create([
            'name'         =>'Botones Excel',
            'slug'         =>'excel.index',
            'description'  =>'Ver botones de excel',
        ]);
        Permission::create([
            'name'         =>'Cargar Usuarios',
            'slug'         =>'excel.users',
            'description'  =>'Carga Usuarios desde excel',
        ]);
        Permission::create([
            'name'         =>'Cargar Datos de Usuarios',
            'slug'         =>'excel.userDatas',
            'description'  =>'Carga Datos de Usuarios desde excel',
        ]);
        Permission::create([
            'name'         =>'Cargar Puntos de Usuarios',
            'slug'         =>'excel.userPoints',
            'description'  =>'Carga Puntos de Usuarios desde excel',
        ]);


    }
}
