<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([            
            'user_name' => 'admin',
            'password' => Hash::make('admin'),
            'type' => 'Admin'
        ]);     

       

    }
}
