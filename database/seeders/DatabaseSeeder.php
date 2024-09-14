<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\StudentsTableSeeder;
use Database\Seeders\Schedule;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // $this->call(UserSeeder::class);
        // $this->call(StudentsTableSeeder::class);
        // $this->call(ClassroomTableSeeder::class);
        // $this->call(Schedule::class);
        $this->call(EmailSeeder::class);
    }
}