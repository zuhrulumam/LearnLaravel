<?php

use Illuminate\Database\Seeder;
use DCN\RBAC\Models\Role;
use App\User;

class RoleTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $adminRole = Role::create([
                    'name' => 'Admin',
                    'slug' => 'admin',
                    'description' => '', // optional
                    'parent_id' => NULL, // optional, set to NULL by default
        ]);
        
       $blogWriter =  Role::create([
            'name' => 'Blog Writer',
            'slug' => 'blog.writer',
            'description' => '', // optional
            'parent_id' => $adminRole->id, // optional, set to NULL by default
        ]);

        $user = User::find(1);
        $user->attachRole($adminRole);
        
        $user1 = User::find(4);
        $user1->attachRole($blogWriter);
    }

}
