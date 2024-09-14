<?php

namespace App\Http\Controllers;

use App\Models\Alglocation;
use Illuminate\Http\Request;

class Algtransportandlogistics extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return response()->json(["message"=> "alg api working" ], 200);
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


        /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function pickupLocation(Request $request)
    {
        //
         if(!$request->name){
            return response()->json([
                'message' => 'Please provide a location name for pick service'
            ], 422);
         }

         $location = new Alglocation();
            $location->name = $request->name;
            $location->longitude = $request->longitude;
            $location->latitude = $request->latitude;
            $location->city = $request->city;
            $location->zip = $request->zip;
            $location->save();

            $locations = Alglocation::where('id', $location->id)->first();
            return response()->json($locations, 200);
    }
}
