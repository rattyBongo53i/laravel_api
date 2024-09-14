<?php

namespace App\Http\Controllers;
use App\Models\Student;
use App\Models\Person;
use Illuminate\Support\Facades\Cache;

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
        $students = Cache::remember('students', 350, function () {
            return Student::latest()->get();
        });
        return response()->json($students);

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
}