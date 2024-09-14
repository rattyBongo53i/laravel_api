<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use BaconQrCode\Renderer\Color\Rgb;
use Illuminate\Http\Request;

use App\Models\MatchGame;
use App\Models\Odd;
use App\Models\Prediction;
use App\Models\Slip;
use Illuminate\Support\Facades\DB;

class OddController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $odds = Odd::all();
        return response()->json($odds);
    }

    
    
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dudeAwake()
    {
        //
        $odds = Odd::all();
        return response()->json([
            'message' => 'Dude is Awake, remote Api is working' 
        ], 201);
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

    public function deleteAllOdds()
    {
        $odds = Odd::all();
        foreach ($odds as $odd) {
            $odd->delete();
        }
        return response()->json([
            'message' => 'All Odds Deleted Successfully'
        ], 201);
    }
 
}
