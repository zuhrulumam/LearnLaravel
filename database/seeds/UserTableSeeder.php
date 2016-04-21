<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        User::create([

            'name' => 'Muhammad Zuhrul Umam',
            'email' => 'zuhrulu@gmail.com',
            'password' => Hash::make('secret'),
        ]);
        User::create([

            'name' => 'Hinata Shoyo',
            'email' => 'zuhrulu16@gmail.com',
            'password' => Hash::make('secret'),
        ]);
    }

}
