<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name'=>'admin',
                'username'=>'admin',
                'email'=>'admin@mail.com',
                'password'=>Hash::make('123456789'),
                'is_admin'=>true
            ],
            [
                'name'=>'user',
                'username'=>'user',
                'email'=>'user@mail.com',
                'password'=>Hash::make('123456789'),
                'is_admin'=>false
            ]
        ]);
    }
}
