<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use App\Models\Classroom;

class ClassroomTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('classrooms')->insert([
            [
                'name' => 'Jasmine',
                'Age' => '0 - 1',
                'description' => 'Babyland',
                'badge' => 'image_url',
                'Teacher_id' => '2',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
                
            ],
            [
                'name' => 'Olive',
                'Age' => '1 - 2',
                'description' => 'Creche',
                'Teacher_id' => '3',
                'badge' => 'image_url',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
                
            ],
            [
                'name' => 'Sunlac',
                'Age' => '2 - 3',
                'description' => 'Nursery1',
                'Teacher_id' => '3',
                'badge' => 'image_url',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
                
            ],
            [
                'name' => 'Daisy/Tulip',
                'Age' => '3 - 4',
                'description' => 'Nursery2',
                'Teacher_id' => '4',
                'badge' => 'image_url',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
                
            ],
            [
                'name' => 'Hibiscus',
                'Age' => '4 - 5',
                'description' => 'KG1',
                'Teacher_id' => '5',
                'badge' => 'image_url',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
                
            ],
            [
                'name' => 'Reception',
                'Age' => '5 - 6',
                'description' => 'KG2',
                'Teacher_id' => '6',
                'badge' => 'image_url',
            ],
            [
                'name' => 'Year1',
                'Age' => '6 - 7',
                'description' => 'first Grade',
                'Teacher_id' => '7',
                'badge' => 'image_url',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
                
            ],
            [
                'name' => 'Year2',
                'Age' => '7 - 8',
                'description' => 'second Grade',
                'Teacher_id' => '8',
                'badge' => 'image_url',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
                
            ],
            [
                'name' => 'Year3',
                'Age' => '8 - 9',
                'description' => 'third Grade',
                'Teacher_id' => '9',
                'badge' => 'image_url',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
                
            ],
            [
                'name' => 'Year4',
                'Age' => '9 - 10',
                'description' => 'fourth Grade',
                'Teacher_id' => '10',
                'badge' => 'image_url',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
                
            ],
            [
                'name' => 'Year5',
                'Age' => '10 - 11',
                'description' => 'fifth Grade',
                'Teacher_id' => '11',
                'badge' => 'image_url',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
                
            ],
            [
                'name' => 'Year6',
                'Age' => '11 - 12',
                'description' => 'six Grade',
                'Teacher_id' => '12',
                'badge' => 'image_url',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
                
            ],
        ]);
    }
}