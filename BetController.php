<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Match;
use App\Models\Odd;
use App\Models\Prediction;
use App\Models\Slip;
use Illuminate\Support\Facades\DB;

class BetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //return all matches
        
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


    public function predictionOdd ($match_id){
        // return response()->json(["match_id"=> $match_id]);

        $homeWin = DB::table('odds')
            ->select('odd', 'prediction as bet', 'match_id')
            ->where('bet_type', '=', 'full_time_result')
            ->where('match_id', '=', $match_id)
            ->where('prediction', '=', 'home_win')
            ->first();

            // return response()->json(["odds"=> $home]);

        // $affected = DB::select('select * from odds where match_id = ?', $match_id);

        $response = [
           
            "status" => "success",
            "message" => " home win odd for match_id 1",
            "homeWin" => $homeWin,

        ];

        return response()->json($response);
    }



    public function oddFulltimeResult (Request $request){
        
        $match_id = $request->input('match_id');
        $slip_id = $request->input('slip_id');
        $match = Match::find($match_id);

        try {

        // $odds = ;dd::where('match_id', '=', $match_id)
        // ->orderBy('id', 'desc')
        // ->get();
        

        $homeWin = DB::table('odds')
        ->select('odd', 'prediction as bet', 'match_id')
        ->where('bet_type', '=', 'full_time_result')
        ->where('match_id', '=', $match_id)
        ->where('prediction', '=', 'home_win')
        ->first();
        
        $awayWin = DB::table('odds')    
        ->select('odd', 'prediction as bet', 'match_id')
        ->where('bet_type', '=', 'full_time_result')
        ->where('match_id', '=', $match_id)
        ->where('prediction', '=', 'away_win')
        ->first();

        $draw = DB::table('odds')
        ->select('odd', 'prediction as bet', 'match_id')
        ->where('bet_type', '=', 'full_time_result')
        ->where('match_id', '=', $match_id)
        ->where('prediction', '=', 'draw')
        ->first();


        $response = [
           
            "status" => "success",
            "message" => " full time result odds for match_id is "."". $match_id,
            "match" => $match,
            "homeWin" => $homeWin,
            "awayWin" => $awayWin,
            "draw" => $draw,    
            "slip_id" => $slip_id,
            "match_id" => $match_id,

        ];

        return response()->json($response);

                } catch (\Exception $e) {
                    $response = [
                        "status" => "error",
                        "message" => "full time result prediction odd for match_id is "."". $match_id,
                        "error" => $e->getMessage(),
                        "line" => $e->getLine(),
                        "file" => $e->getFile(),
                        "code" => $e->getCode(),
                    ];

                    return response()->json($response);
                }
    }

    public function game(Request $request){
        $match = Match::find($request->input('match_id'));
        $match_id = $request->input('match_id');
        $homeWin = DB::table('odds')
        ->select('odd', 'prediction as bet', 'match_id')
        ->where('bet_type', '=', 'full_time_result')
        ->where('match_id', '=', $match_id)
        ->where('prediction', '=', 'home_win')
        ->first();
        
        $awayWin = DB::table('odds')    
        ->select('odd', 'prediction as bet', 'match_id')
        ->where('bet_type', '=', 'full_time_result')
        ->where('match_id', '=', $match_id)
        ->where('prediction', '=', 'away_win')
        ->first();

        $draw = DB::table('odds')
        ->select('odd', 'prediction as bet', 'match_id')
        ->where('bet_type', '=', 'full_time_result')
        ->where('match_id', '=', $match_id)
        ->where('prediction', '=', 'draw')
        ->first();

        $response = [
           
            "status" => "success",
            "message" => " full time result odds for match_id is "."". $match_id,
            "match" => $match,
            "homeWin" => $homeWin,
            "awayWin" => $awayWin,
            "draw" => $draw,    
            "match_id" => $match_id,

        ];

        return $response;

        // return response()->json($response);

    }

    public function odds(Request $request){

        $match_id = $request->input('match_id');
        $home = $request->input('home');
        $away = $request->input('away');
        $league = $request->input('league');
        $start_time = $request->input('start_time');
        $odds = $request->input('odds');
        
        return response()->json(["match_id"=> $match_id, "home"=> $home, "away"=> $away, "league"=> $league, "start_time"=> $start_time, "odds"=> $odds]);
        
        
        $homeWin = $odds[0];
        $draw = $odds[1];
        $awayWin = $odds[2];
        $homeWinOrDraw = $odds[3];
        $awayWinOrDraw = $odds[4];
        $homeWinOrAwayWin = $odds[5];
        $over0_5 = $odds[6];
        $under0_5 = $odds[7];
        $over1_5 = $odds[8];
        $under1_5 = $odds[9];
        $over2_5 = $odds[10];
        $under2_5 = $odds[11];
        $over3_5 = $odds[12];
        $under3_5 = $odds[13];
        $over4_5 = $odds[14];
        $under4_5 = $odds[15];
        $over5_5 = $odds[16];
        $under5_5 = $odds[17];
        $bothTeamsToScoreYes = $odds[18];
        $bothTeamsToScoreNo = $odds[19];
        // $firstGoalHome = $odds[20];
        // $firstGoalNone = $odds[21];
        // $firstGoalAway = $odds[22]; 

        //create new match
        $match = new Match;
        $match->match_id = $match_id;
        $match->home = $home;
        $match->away = $away;
        $match->league = $league;
        $match->start_time = $start_time;
        if ($match->save()) {

            //create new odds
            $odd = new Odd;
            $odd->match_id = $match_id;
            $odd->bet_type = 'full_time_result';
            $odd->prediction = 'home_win';
            $odd->odd = $homeWin;
            $odd->save();

            $odd = new Odd;
            $odd->match_id = $match_id;
            $odd->bet_type = 'full_time_result';
            $odd->prediction = 'draw';
            $odd->odd = $draw;
            $odd->save();

            $odd = new Odd;
            $odd->match_id = $match_id;
            $odd->bet_type = 'full_time_result';
            $odd->prediction = 'away_win';
            $odd->odd = $awayWin;
            $odd->save();

            $odd = new Odd;
            $odd->match_id = $match_id;
            $odd->bet_type = 'double_chance_full_time_result';
            $odd->prediction = 'home_win_or_draw';
            $odd->odd = $homeWinOrDraw;
            $odd->save();

            $odd = new Odd;
            $odd->match_id = $match_id;
            $odd->bet_type = 'double_chance_full_time_result';
            $odd->prediction = 'away_win_or_draw';
            $odd->odd = $awayWinOrDraw;
            $odd->save();

            $odd = new Odd;
            $odd->match_id = $match_id;
            $odd->bet_type = 'double_chance_full_time_result';
            $odd->prediction = 'home_win_or_away_win';
            $odd->odd = $homeWinOrAwayWin;
            $odd->save();

            $odd = new Odd;
            $odd->match_id = $match_id;
            $odd->bet_type = 'over_under_0_5';
            $odd->prediction = 'over_0_5';
            $odd->odd = $over0_5;
            $odd->save();

            $odd = new Odd;
            $odd->match_id = $match_id;
            $odd->bet_type = 'over_under_0_5';
            $odd->prediction = 'under_0_5';
            $odd->odd = $under0_5;
            $odd->save();

            $odd = new Odd;
            $odd->match_id = $match_id;
            $odd->bet_type = 'over_under_1_5';
            $odd->prediction = 'over_1_5';
            $odd->odd = $over1_5;
            $odd->save();

            $odd = new Odd;
            $odd->match_id = $match_id;
            $odd->bet_type = 'over_under_1_5';
            $odd->prediction = 'under_1_5';
            $odd->odd = $under1_5;
            $odd->save();
            
            $odd = new Odd;
            $odd->match_id = $match_id;
            $odd->bet_type = 'over_under_2_5';
            $odd->prediction = 'over_2_5';
            $odd->odd = $over2_5;
            $odd->save();

            $odd = new Odd;
            $odd->match_id = $match_id;
            $odd->bet_type = 'over_under_2_5';
            $odd->prediction = 'under_2_5';
            $odd->odd = $under2_5;
            $odd->save();

            $odd = new Odd;
            $odd->match_id = $match_id;
            $odd->bet_type = 'over_under_3_5';
            $odd->prediction = 'over_3_5';
            $odd->odd = $over3_5;
            $odd->save();

            $odd = new Odd;
            $odd->match_id = $match_id;
            $odd->bet_type = 'over_under_3_5';
            $odd->prediction = 'under_3_5';
            $odd->odd = $under3_5;
            $odd->save();

            $odd = new Odd;
            $odd->match_id = $match_id;
            $odd->bet_type = 'over_under_4_5';
            $odd->prediction = 'over_4_5';
            $odd->odd = $over4_5;
            $odd->save();

            $odd = new Odd;
            $odd->match_id = $match_id;
            $odd->bet_type = 'over_under_4_5';
            $odd->prediction = 'under_4_5';
            $odd->odd = $under4_5;
            $odd->save();

            $odd = new Odd;
            $odd->match_id = $match_id;
            $odd->bet_type = 'over_under_5_5';
            $odd->prediction = 'over_5_5';
            $odd->odd = $over5_5;
            $odd->save();

            $odd = new Odd;
            $odd->match_id = $match_id;
            $odd->bet_type = 'over_under_5_5';
            $odd->prediction = 'under_5_5';
            $odd->odd = $under5_5;
            $odd->save();

            $odd = new Odd;
            $odd->match_id = $match_id;
            $odd->bet_type = 'both_teams_to_score';
            $odd->prediction = 'both_teams_to_score_no';
            $odd->odd = $bothTeamsToScoreNo;
            $odd->save();

            $odd = new Odd;
            $odd->match_id = $match_id;
            $odd->bet_type = 'both_teams_to_score';
            $odd->prediction = 'both_teams_to_score_yes';
            $odd->odd = $bothTeamsToScoreYes;
            $odd->save();

            // $odd = new Odd;
            // $odd->match_id = $match_id;
            // $odd->bet_type = 'full_time_result_firstGoalHome';
            // $odd->prediction = 'firstGoalHome';
            // $odd->odd = $firstGoalHome;
            // $odd->save();

            // $odd = new Odd;
            // $odd ->match_id = $match_id;
            // $odd->bet_type = 'full_time_result_firstGoalAway';
            // $odd->prediction = 'firstGoalAway';
            // $odd->odd = $firstGoalAway;
            // $odd->save();

            // $odd = new Odd;
            // $odd->match_id = $match_id;
            // $odd->bet_type = 'full_time_result_firstGoalNone';
            // $odd->prediction = 'firstGoalNone';
            // $odd->odd = $firstGoalNone;
            // $odd->save();


            $response = [
                "status" => "success",
                "message" => "match created",
                "match" => $match,
            ];
            
        } else {
            $response = [
                "status" => "error",
                "message" => "match not created",
            ];
        }
        return response()->json($response);
        $response = [
            "status" => "success",
            "message" => "game odds",
            "match_id" => $match_id,
            "homeWin" => $homeWin,
            "draw" => $draw,
            "awayWin" => $awayWin,
            "homeWinOrDraw" => $homeWinOrDraw,
            "awayWinOrDraw" => $awayWinOrDraw,
            "homeWinOrAwayWin" => $homeWinOrAwayWin,
            "over0_5" => $over0_5,
            "under0_5" => $under0_5,
            "over1_5" => $over1_5,
            "under1_5" => $under1_5

 
            // "odds" => $odds,
     ];

        return response()->json($response);
    } 

    public function matchInfo(Request $request){
        
    }
}

/*
       let matchOdds = [
                homeWin = $odds[0];
                draw = $odds[1];
                awayWin = $odds[2];
                homeWinOrDraw = $odds[3];
                awayWinOrDraw = $odds[4];
                homeWinOrAwayWin = $odds[5];
                over0_5 = $odds[6];
                under0_5 = $odds[7];
                over1_5 = $odds[8];
                under1_5 = $odds[9];
                over2_5 = $odds[10;,
                under2_5 = $odds[11;,
                over3_5 = $odds[12;,
                under3_5 = $odds[13;,
                over4_5 = $odds[14;,
                under4_5 = $odds[15;,
                over5_5 = $odds[16;,
                under5_5 = $odds[17;,
                bothTeamsToScoreYes = $odds[18;,
                bothTeamsToScoreNo = $odds[19;,
                firstGoalHome = $odds[20;,
                firstGoalNone = $odds[21;,
                firstGoalAway = $odds[22;,


              ];

              php artisan make:migration create_employeeDetails_table --create=Employee

              */