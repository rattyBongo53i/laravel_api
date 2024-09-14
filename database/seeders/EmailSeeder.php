<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class EmailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
                    DB::table('emails')->insert([
            [
                'email_address' => 'james@norway.com',
                'student_id' => '1',
                'parent_id' => '2',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
                
            ],
                    [
                'email_address' => 'kojo53i@live.com',
                'student_id' => '1',
                'parent_id' => '3',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
                
            ],
                    [
                'email_address' => 'msbee.boa@gmail.com',
                'student_id' => '1',
                'parent_id' => '4',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
                
            ],
               ]);
    }
}