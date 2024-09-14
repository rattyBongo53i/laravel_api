<?php

namespace App\Http\Controllers;

use App\Models\AuthEmployer;
use App\Models\Company;
use App\Models\Employer;
use App\Models\Employee;
use App\Models\OrdableEmployer;
use App\Models\OrdablEmployer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\OrderEmployer;
use Illuminate\Support\Str;
use Carbon\Carbon;

class OrdableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $cacheKey = 'all-employers';
        $cacheTime = 60*60*24; //

        $employers = Cache::remember($cacheKey, $cacheTime, function () {
            return Employer::latest()->get();
        });

       return response()->json([
            'employers' => $employers
        ], 200);
    }

        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getOrdablEmployer()
    {
        //

        $cacheKey = 'all-ordable-employers';
        $cacheTime = 60*60*24; //

        $employers = Cache::remember($cacheKey, $cacheTime, function () {
            return OrdablEmployer::latest()->get();
        });

       return $employers;
    }



    public function getEmployersEmployees($id)
    {
        $employer = Employer::where('id', $id)->first();

        // $employees = Employee::where('employer_id', $employer->id)->limit(6)->get();
        // get employees by employer id limit 6
        $employees = Employee::where('employer_id', $employer->id)->limit(4)->get();

        return response()->json([
            'employer' => $employer,
            'employees' => $employees
        ], 200);
    }

    //getEmployeeById

    public function getEmployeeById($id)
    {
        $employee = Employee::where('id', $id)->first();

        return response()->json([
            'employee' => $employee
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // create a single company for a single employer
        $company = new Company();
        $company->name = 'Codjosoft LLC';
        $company->description = 'World international software Company';
        $company->address = 'Company Address';
        $company->city = 'Company City';
        $company->zip = 'Company Zip';
        $company->departments = 'Company Departments';
        $company->registration_number = 'Company Registration Number';
        $company->start_date = 'Company Start Date';
        $company->employer_id = 1;
        $company->save();

         $companys = Company::where('id', $company->id)->first();

         return response()->json($companys, 200);




        return response()->json([
            'message' => 'OrdableController index'
        ], 200);
    }


       /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function registerEmployer(Request $request)
    {

        // return response()->json([
        //     'message' => 'OrdableController registerEmployer'
        // ], 200);
        //
        $fields = $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'company' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string'
        ]);


        // return response()->json($fields, 200);
        $user = OrdableEmployer::create([
            'first_name' => $fields['first_name'],
            'last_name' => $fields['last_name'],
            'company' => $fields['company'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password'])
        ]);

        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'Employer' => $user,
            'token' => $token
        ];

        return response()->json($response, 201);
    }


    public function onBoardEmployer(Request $request){

        // return response()->json([
        //     // "message" => "OrdableController onBoardEmployer",
        //     $request->all()
        // ], 200);


        $this_ordableEmployer = OrdablEmployer::where('email', $request->email)->first();

        if($this_ordableEmployer){
            return response()->json([$this_ordableEmployer,
                'message' => 'Employer email already exists',
                'success' => false,
            ], 200);
        }

        // return $request->all();
        // $fields = $request->validate([
        //     'first_name' => 'required|string',
        //     'last_name' => 'required|string',
        //     'company' => 'required|string',
        //     'email' => 'required|string|unique:users,email',
        //     'password' => 'required|string'
        // ]);

        $OrdablEmployer = new OrdablEmployer();
        $OrdablEmployer->first_name = $request['firstname'];
        $OrdablEmployer->last_name = $request['lastname'];
        $OrdablEmployer->company = $request['company'];
        $OrdablEmployer->email = $request['email'];

        $OrdablEmployer->save();
        $OrdablEmployers = OrdablEmployer::where('id', $OrdablEmployer->id)->first();

        return response()->json([$OrdablEmployers,
         "message" => "Ordable Employer created successfully",
         "success" => true,
        ], 200);


    }

    public function setOTP(Request $request){
        if($request['otp'] != "" || $request['otp'] != null ){
            $ordable = new OrdableEmployer();
            $ordable->first_name = "isaac";
            $ordable->last_name = "yeboah";
            $ordable->email = $request['email'];
            $ordable->zip = $request['otp'];
            $ordable->created_at = Carbon::now();
            $ordable->updated_at = Carbon::now();

            $ordable->save();
            $ordable_otp = OrdableEmployer::where('id', $ordable->id)->first();
            return response()->json($ordable_otp);

        }
        return response()->json([
            "message"=> "no otp code sent"
        ]);
    }

    public function getOTP($email){
        //select zip from ordableEmployer with $email

        $zip = OrdableEmployer::where('email', $email)
                                ->select('zip')
                                ->get();
        if(!$zip){
            return response()->json([
                "message" => "email not found"
            ]);
        }
        return $zip;
    }


         /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function loginEmployer(Request $request)
    {
        $fields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        // Check email
        $employer = OrdableEmployer::where('email', $fields['email'])->first();

        // Check password

        if(!$employer || !Hash::check($fields['password'], $employer->password)) {
            return response([
                'message' => 'Bad creds'
            ], 401);
        }

        $token = $employer->createToken('myapptoken')->plainTextToken;

        $response = [
            'Employer' => $employer,
            'token' => $token
        ];

        return response($response, 201);

    }

    public function logout (Request $request) {
        auth()->user()->tokens()->delete();

        return [
            'message' => 'Logged out'
        ];
    }

    //get registered employer
    public function getEmployers()
    {
        $employers = OrdableEmployer::all();

        return response()->json([
            'employers' => $employers
        ], 200);
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
