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
            'username' => 'admin',
            'password' => Hash::make('admin'),
            'type' => 'Admin'
        ]);

        DB::table('users')->insert([            
            'user_id' => 't123',
            'password' => Hash::make('t123'),
            'type' => 'Teacher'
        ]);

        DB::table('users')->insert([            
            'user_id' => 's123',
            'password' => Hash::make('s123'),
            'type' => 'Student'
        ]);

    }
}
