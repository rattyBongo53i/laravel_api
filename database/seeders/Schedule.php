<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class Schedule extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
             DB::table('schedules')->insert([
            [
                'name' => 'TERM 1',
                'status' => 'upcoming',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
                
            ],
                   [
                'name' => 'TERM 2',
                'status' => 'upcoming',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
                
            ],       [
                'name' => 'TERM 3',
                'status' => 'upcoming',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
                
            ],
                   [
                'name' => 'SUMMER_SCHOOL',
                'status' => 'upcoming',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
                
            ],

        ]);
    }
}