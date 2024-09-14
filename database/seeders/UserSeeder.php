<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            [
                'name' => 'Admin Master',
                'role' => 'Super_Admin',
                'email' => 'Morkeh@norway.com',
                'password' => Hash::make('admin1234'),
                'email_verified_at' => now(),
                
            ],
            [
                'name' => 'Admin User',
                'role' => 'Admin',
                'email' => 'system@norway.com',
                'password' => Hash::make('admin1234'),
                'email_verified_at' => now(),
                
            ],
            [
                'name' => 'Elise Mary James',
                'role' => 'Teacher',
                'email' => 'james@norway.com',
                'password' => Hash::make('admin1234'),
                'email_verified_at' => now(),
                
            ],
            [
                'name' => 'Bruce Wayne',
                'role' => 'Parent',
                'email' => 'bruce@norway.com',
                'password' => Hash::make('admin1234'),
                'email_verified_at' => now(),
                
            ],
            [
                'name' => 'Dennis Miller',
                'role' => 'Finance',
                'email' => 'miller@norway.com',
                'password' => Hash::make('admin1234'),
                'email_verified_at' => now(),
                
            ],

        ]);
    }
}
