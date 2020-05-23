<?php

use Illuminate\Database\Seeder;
/*-- Spatie --*/
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
/*-- Spatie --*/
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$admin = $writer = $writerRole = $adminRole = NULL;
        $viewPostsPermission = $createPostsPermission = $updatePostsPermission = $deletePostsPermission = NULL;

        $adminRole = Role::create(['name' => 'Admin','display_name'=>'Administrador']);
        $writerRole = Role::create(['name' => 'Writer','display_name'=>'Escritor']);

        //Permission to the user to 'view posts'
        $viewPostsPermission = Permission::create(['name' => 'View posts']);
        $createPostsPermission = Permission::create(['name' => 'Create posts']);
        $updatePostsPermission = Permission::create(['name' => 'Update posts']);
        $deletePostsPermission = Permission::create(['name' => 'Delete posts']);

        //Access Policy - Permission to the user to 'view users'
        $viewUsersPermission = Permission::create(['name' => 'View users']);
        $createUsersPermission = Permission::create(['name' => 'Create users']);
        $updateUsersPermission = Permission::create(['name' => 'Update users']);
        $deleteUsersPermission = Permission::create(['name' => 'Delete users']);

        //Access Policy - Permission to the user to 'view users'
        $viewRolesPermission = Permission::create(['name' => 'View roles']);
        $createRolesPermission = Permission::create(['name' => 'Create roles']);
        $updateRolesPermission = Permission::create(['name' => 'Update roles']);
        $deleteRolesPermission = Permission::create(['name' => 'Delete roles']);

        $viewPermissionsPermission = Permission::create(['name' => 'View permissions', 'display_name'=>'Ver permisos']);
        $updatePermissionsPermission = Permission::create(['name' => 'Update permissions', 'display_name'=>'Actualizar permisos']);

    	$admin = new User;
    	$admin->name = 'chechepech';
    	$admin->email = 'cheche@pech.com';
    	$admin->password = '1234567r';
    	$admin->save();
        $admin->assignRole($adminRole);

        $writer = new User;
        $writer->name = 'reyespech';
        $writer->email = 'reyes@pech.com';
        $writer->password = '1234567r';
        $writer->save();
        $writer->assignRole($writerRole);
    }
}
