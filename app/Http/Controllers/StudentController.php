<?php

namespace App\Http\Controllers;
use App\Models\Student;
use App\Models\Person;
use App\Models\RoyalParent;
use App\Models\RoyalStudent;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       $cacheKey = 'students.all';

        // Check if the students are cached, if not fetch from DB and cache them
        $students = Cache::remember($cacheKey, 60 * 60, function () {
            // Fetch all students from the database
            return RoyalStudent::all();
        });

        // Return the cached students
        return response()->json($students);

    }
    
    //get student with id
    public function showStudent($id)
    {
        $student = RoyalStudent::find($id);
        if($student){
            return response()->json($student);
        }
        return response()->json(['message' => 'Student not found'], 404);
    }

    public function getPeople(){
        
    //    return    Person::latest()->get();
       return    Person::latest()

            ->whereNotNull('dob') // Email is not null
           ->where('dob', '!=', '') // Email is not an empty string
                                   ->where(function ($query) {
                             $query->whereNull('email') // Image is null
                                   ->orWhere('email', ''); // OR image is an empty string
                                   })
        //    ->where('email', '==', 'null') // Email
           ->get();
        
    }
    //get all parents from the table parents in the database
    public function getParents(){
        return      $cacheKey = 'parents.all';

        // Check if the students are cached, if not fetch from DB and cache them
        $response = Cache::remember($cacheKey, 60 * 60, function () {
            // Fetch all students from the database
            return RoyalParent::all();
        });
        return response()->json($response);
    }

        public function countPeople(){
        
    //    return    Person::latest()->get();
       return    Person::latest()

              ->whereNotNull('dob') // Email is not null
           ->where('dob', '!=', '') // Email is not an empty string
                                   ->where(function ($query) {
                             $query->whereNull('email') // Image is null
                                   ->orWhere('email', ''); // OR image is an empty string
                                   })
           ->count();
        
    }
    public function get_all_student(){
        
         $cacheKey = 'students.all';

        // Check if the students are cached, if not fetch from DB and cache them
        $students = Cache::remember($cacheKey, 60 * 60, function () {
            // Fetch all students from the database
            return RoyalStudent::all();
        });

        // Return the cached students
        return response()->json($students);
        
    }

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function test_api(){
        return response()->json(["message" => "Student count by age, if u get this api is working"]);
    }
}