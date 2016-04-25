<?php

use Illuminate\Database\Seeder;
use DCN\RBAC\Models\Permission;
use DCN\RBAC\Models\Role;

class PermissionTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $blogPermission = Permission::create([
            'name' => 'Edit Blog',
            'slug' => 'edit.blog',
            'model' => 'App\Blog',
        ]);
        Permission::create([
            'name' => 'Edit Categories',
            'slug' => 'edit.categories',
            'model' => 'App\Categories',
        ]);
        Permission::create([
            'name' => 'Edit Media',
            'slug' => 'edit.media',
            'model' => 'App\Media',
        ]);
        
        $role = Role::find(2);
        $role->attachPermission($blogPermission);
    }

}
