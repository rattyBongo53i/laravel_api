<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\MatchResource;
use App\Http\Resources\BetResource;
use App\Models\Game;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\MatchGame;
use App\Models\Odd;
use App\Models\Prediction;
use App\Models\Slip;
use App\Models\Url;
use App\Observers\MatchObserver;
use Carbon\Factory;
use Faker\Factory as FakerFactory;
use Illuminate\Support\Facades\DB;
use Mockery\Undefined;
use Illuminate\Support\Facades\Cache;

use function PHPUnit\Framework\isEmpty;

class sampleBetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return all matches
        $matches =MatchGame::where('id','>' ,'0')->with('odds')->orderBy('created_at', 'ASC')->get();
        return response()->json($matches);
        // return response()->json(MatchGame::all());

    }

    public function getAllMatches() {
        $cacheKey = 'all-matches';
        $cacheTime = 60*60*24; // one day
    

         $result = BetResource::collection(Cache::remember($cacheKey,  $cacheTime , function () {
                    return MatchGame::latest()->get();
                }));
        return response()->json($result);
        
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
    public function getMatch(Request $request)
    {
        
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
        $match = MatchGame::find($id);
        $match->delete();
        return response()->json(['message' => 'match deleted successfully']);


    }

    public function getMatchesWithOdds($id){

        $matches = MatchGame::where('id', $id)
                        ->with('odds')
                        ->get();
        if($matches->isEmpty()){
            return response()->json(['message' => 'No matches found']);
        }
        return response()->json($matches);
    
    }

    public function deleteMatches()
    {
        //delete all matches
        $games = MatchGame::all();
        foreach ($games as $game) {
            $game->delete();
        }
        //   return http status code 200
        return response()->json(['message' => 'matches deleted successfully'], 201);

        // return response()->json(200);
    }

    /*******
     * 
     *  Game predictions
     * 
     * 
     */
    public function insertMatch(Request $request)
    {
        //store matches
        //if match exists, update it
        $matched = MatchGame::where('matchUuid', $request->matchUuid)->where('away', $request->away)->first();
        if ($matched) {
            $match_id = $matched->id;
            $matchGame = MatchGame::where('id', $match_id)->first();
            // Cache::forget('all-matches');
          //  $observer = new MatchObserver();
           // $observer->updated($matchGame);
       
            return response()->json($matchGame, 200);
        } else {
                $match = new MatchGame();
                $match->matchUuid = $request->matchUuid;
                $match->home = $request->home;
                $match->away = $request->away;
                $match->league = $request->league;
                $match->start_time = $request->start_time;
                $match->is_live = $request->is_live;
                $match->save();
                // Cache::forget('all-matches');
               // $observer = new MatchObserver();
                //$observer->created($match);
                // return response()->json($match, 201);

      
        }
   
    }
    public function saveUrl(Request $request){
        return $request->all();
        $matched = MatchGame::where('id', $request->match_id)->first();
        if($matched != null){
        // return $matched;
        $urlInserted = Url::where('match_id', $request->match_id)->first();
        if($urlInserted != null){
            return response()->json($urlInserted);
        }
        else {
        $url = new Url();
        $url->match_id = $request->match_id;
        $url->url_type = $request->url_type;
        $url->url = $request->url;
        $url->save();
        $urls = Url::where('id', $url->id)->first();
        return response()->json($urls);

        } return false;
   
     } return response()->json( ["message" => " match id doesn't exit"]);
    }


    public function updateMatch(Request $request)
    {
        //store matches
        //if match exists, update it
        $matched = MatchGame::where('matchUuid', $request->matchUuid)->where('away', $request->away)->first();
        if ($matched) {
            $match_id = $matched->id;
            $matchGame = MatchGame::where('id', $match_id)->first();

               $matchUpdate = MatchGame::where('id', $matchGame->id)->update([
                    'matchUuid' => $request->matchUuid,
                    'home' => $request->home,
                    'away' => $request->away,
                    'league' => $request->league,
                    'start_time' => $request->start_time,
                    'is_live' => $request->is_live,
                ]);
               
               if(isEmpty($matchUpdate->id) || $matchUpdate->id == null){
                return response()->json(['message' => 'failed to update match'], 201);
               
                }
                return response()->json($matchGame);
      
            }
   
    }

    public function insertFull_time_home_odd(Request $request){

        $matched = MatchGame::where('matchUuid', $request->match_uuid)->where('away', $request->away)->first();
        if($matched->id != null){
            // return response()->json($matched->id);
            $odd = Odd::where('match_id', $matched->id)->where('bet_type', 'full_time_home_odd')->first();
          
            if(!empty($odd->id) && $odd->odd != null){
                return response()->json($odd);
            }
            // if(!empty($request->full_time_home_odd) && $request->full_time_home_odd!= null){


            $odd = new Odd();
            $odd->match_id = $matched->id;
            $odd->bet_type = 'full_time_home_odd';
            $odd->prediction = 'full_time_home_odd';
            $odd->odd = $request->odds_home_full_time;
            $odd->save();
            $odds = Odd::where('id', $odd->id)->first();
            return response()->json($odds);
            
            // } return false;

        }
        return response()->json(403, ['message' => 'match not found']);

    }
     public function insertFull_time_draw_odd(Request $request){
           $matched = MatchGame::where('matchUuid', $request->match_uuid)->where('away', $request->away)->first();
             if($matched->id != null){

            $odd = Odd::where('match_id', $matched->id)->where('bet_type', 'odds_draw_full_time')->first();
            // return response()->json($odd);
           
            if(!empty($odd->id) && $odd->odd != null){
                return response()->json($odd);
            }
            if(!empty($request->odds_draw_full_time) && $request->odds_draw_full_time!= null){

            $odds = new Odd();
            $odds->match_id = $request->match_id;
            $odds->bet_type = 'odds_draw_full_time';
            $odds->prediction = 'odds_draw_full_time';
            $odds->odd = $request->odds_draw_full_time;
            $odds->save();
            $odds = Odd::where('id', $odds->id)->first();
            // $odds = Odd::where('id', )->first();
            return response()->json($odds);
            } return false;
        } return false;

    }

        public function insertFull_time_away_odd(Request $request){
            $matched = MatchGame::where('matchUuid', $request->match_uuid)->where('away', $request->away)->first();
            
         if($matched->id != null){
            $odd = Odd::where('match_id', $matched->id)->where('bet_type', 'odds_away_full_time')->first();
            if(!empty($odd->id) && $odd->odd != null){
                return response()->json($odd);
            }   
           
            // if odd is not empty
            if(!empty($request->odds_away_full_time) && $request->odds_away_full_time!= null){
                $odds = new Odd();
                $odds->match_id = $request->match_id;
                $odds->bet_type = 'odds_away_full_time';
                $odds->prediction = 'odds_away_full_time';
                $odds->odd = $request->odds_away_full_time;
                $odds->save();
                $odds = Odd::where('id', $odds->id)->first();
                return response()->json($odds);
            } return false;
        } return false;
    }
    public function insertOdds_doubleChanceHome_full_time(Request $request){
        $matched = MatchGame::where('matchUuid', $request->match_uuid)->where('away', $request->away)->first();
            
        if($matched->id != null){
           $odd = Odd::where('match_id', $matched->id)->where('bet_type', 'odds_doubleChanceHome_full_time')->first();
           if(!empty($odd->id) && $odd->odd != null){
               return response()->json($odd);
           }   
           if(!empty($request->odds_doubleChanceHome_full_time) && $request->odds_doubleChanceHome_full_time!= null){
                
        $odds = new Odd();
        $odds->match_id = $request->match_id;
        $odds->bet_type = 'odds_doubleChanceHome_full_time';
        $odds->prediction = 'odds_doubleChanceHome_full_time';
        $odds->odd = $request->odds_doubleChanceHome_full_time;
        $odds->save();
        $odds = Odd::where('id', $odds->id)->first();
        return response()->json($odds);
        }

         }

    }
    public function insertOdds_doubleChanceHomeAway_full_time(Request $request){
        $matched = MatchGame::where('matchUuid', $request->match_uuid)->where('away', $request->away)->first();
            
        if($matched->id != null){
           $odd = Odd::where('match_id', $matched->id)->where('bet_type', 'odds_doubleChanceHomeAway_full_time')->first();
           if(!empty($odd->id) && $odd->odd != null){
               return response()->json($odd);
           } 
           if(!empty($request->odds_doubleChanceHomeAway_full_time) && $request->odds_doubleChanceHomeAway_full_time!= null){
                
            $odds = new Odd();
            $odds->match_id = $request->match_id;
            $odds->bet_type = 'odds_doubleChanceHomeAway_full_time';
            $odds->prediction = 'odds_doubleChanceHomeAway_full_time';
            $odds->odd = $request->odds_doubleChanceHomeAway_full_time;
            $odds->save();
            $odds = Odd::where('id', $odds->id)->first();
            return response()->json($odds);
            } return false;
        }

    }
    public function insertOdds_doubleChanceAway_full_time(Request $request){
        $matched = MatchGame::where('matchUuid', $request->match_uuid)->where('away', $request->away)->first();
            
        if($matched->id != null){
           $odd = Odd::where('match_id', $matched->id)->where('bet_type', 'odds_doubleChanceAway_full_time')->first();
           if(!empty($odd->id) && $odd->odd != null){
               return response()->json($odd);
           } 
                
                if(!empty($request->odds_doubleChanceAway_full_time) && $request->odds_doubleChanceAway_full_time!= null){
                $odds = new Odd();
                $odds->match_id = $request->match_id;
                $odds->bet_type = 'odds_doubleChanceAway_full_time';
                $odds->prediction = 'odds_doubleChanceAway_full_time';
                $odds->odd = $request->odds_doubleChanceAway_full_time;
                $odds->save();
                $odds = Odd::where('id', $odds->id)->first();
                return response()->json($odds);
                  } return false;
            }

    }
    public function insertOdds_over_15_full_time(Request $request){
        $matched = MatchGame::where('matchUuid', $request->match_uuid)->where('away', $request->away)->first();
            
        if($matched->id != null){
           $odd = Odd::where('match_id', $matched->id)->where('bet_type', 'odds_over_15_full_time')->first();
           if(!empty($odd->id) && $odd->odd != null){
               return response()->json($odd);
           } 
           if(!empty($request->odds_over_15_full_time) && $request->odds_over_15_full_time!= null){
                
        $odds = new Odd();
        $odds->match_id = $request->match_id;
        $odds->bet_type = 'odds_over_15_full_time';
        $odds->prediction = 'odds_over_15_full_time';
        $odds->odd = $request->odds_over_15_full_time;
        $odds->save();
        $odds = Odd::where('id', $odds->id)->first();
        return response()->json($odds);
           } return false;
        }

    }
    public function insertOdds_under_15_full_time(Request $request){
        $matched = MatchGame::where('matchUuid', $request->match_uuid)->where('away', $request->away)->first();
            
        if($matched->id != null){
           $odd = Odd::where('match_id', $matched->id)->where('bet_type', 'odds_under_15_full_time')->first();
           if(!empty($odd->id) && $odd->odd != null){
               return response()->json($odd);
           } 
           if(!empty($request->odds_under_15_full_time) && $request->odds_under_15_full_time!= null){
                
            $odds = new Odd();
            $odds->match_id = $request->match_id;
            $odds->bet_type = 'odds_under_15_full_time';
            $odds->prediction = 'odds_under_15_full_time';
            $odds->odd = $request->odds_under_15_full_time;

            $odds->save();
            $odds = Odd::where('id', $odds->id)->first();
            return response()->json($odds);
           } return false;
            }

    }
    public function insertOdds_over_25_full_time(Request $request){
        $matched = MatchGame::where('matchUuid', $request->match_uuid)->where('away', $request->away)->first();
            
        if($matched->id != null){
           $odd = Odd::where('match_id', $matched->id)->where('bet_type', 'odds_over_25_full_time')->first();
           if(!empty($odd->id) && $odd->odd != null){
               return response()->json($odd);
           } 
           if(!empty($request->odds_over_25_full_time) && $request->odds_over_25_full_time!= null){
                
            $odds = new Odd();
            $odds->match_id = $request->match_id;
            $odds->bet_type = 'odds_over_25_full_time';
            $odds->prediction = 'odds_over_25_full_time';
            $odds->odd = $request->odds_over_25_full_time;
            $odds->save();
            $odds = Odd::where('id', $odds->id)->first();
            return response()->json($odds);
           } return false;
            
        }

    }
    public function insertOdds_under_25_full_time(Request $request){
        $matched = MatchGame::where('matchUuid', $request->match_uuid)->where('away', $request->away)->first();
            
        if($matched->id != null){
           $odd = Odd::where('match_id', $matched->id)->where('bet_type', 'odds_under_25_full_time')->first();
           if(!empty($odd->id) && $odd->odd != null){
               return response()->json($odd);
           } 
           if(!empty($request->odds_under_25_full_time) && $request->odds_under_25_full_time!= null){
                
            $odds = new Odd();
            $odds->match_id = $request->match_id;
            $odds->bet_type = 'odds_under_25_full_time';
            $odds->prediction = 'odds_under_25_full_time';
            $odds->odd = $request->odds_under_25_full_time;
            $odds->save();
            $odds = Odd::where('id', $odds->id)->first();
            return response()->json($odds);
              } return false;
            }

    }

    //get matchGame by Id 
    public function getMatchById($id){
        
        $matched = Cache::remember('match', 150, function () use ($id) {
            return MatchGame::where('id', $id)->first();
        });
        
        return response()->json($matched);
    }
    
     public function getMatchByUuid(Request $request){
        $match = MatchGame::where('matchUuid', $request->match_uuid)->where('away', $request->away)->first();
        if($match->id != null){
            return response()->json($match);
        } return false;
        // return response()->json($match);
    }
 
    public function getOddsWithMatchId($id){

        //cache remember $odd

        $odds = Cache::remember('odds', 150, function () use ($id) {
            return Odd::where('match_id', $id)->get();
        });
        
            return response()->json($odds);
    }


    public function getMatchData(Request $request){
        $matches = MatchGame::latest()->get();
        return response()->json($matches);

    }
    public function getSlips(){
        $slips = Slip::where('id', '>', '0')->orderBy('created_at', 'ASC')->get();
        return $slips;
    }

    public function getSlip($id){
        $slip = Slip::where('slips.id', $id)
        //left join predictions
        ->leftJoin('predictions', 'predictions.slip_id', '=', 'slips.id')
        //left join matches
        ->leftJoin('match_games', 'match_games.id', '=', 'predictions.match_id')
  
                                ->get()
                                ->toArray();


        if(!empty($slip) && count($slip) > 0) {
            return response()->json($slip);
        }
        // if($prediction != null){
        //     return $prediction;
        // } 
        return response()->json('Prediction not found');
    }
    public function PredictionWithMatchId($id){
        $prediction = Prediction::where('predictions.match_id', $id)
                                
                                ->leftJoin('match_games', 'match_games.id', '=', 'predictions.match_id')
                                // ->select('match_games.home as auto')
                                ->get()
                                ->toArray();
        if(!empty($prediction) && count($prediction) > 0) {
            return response()->json($prediction);
        }
        // if($prediction != null){
        //     return $prediction;
        // } 
        return response()->json('Prediction not found');
        
    }

    
    public function makePrediction(Request $request){
        $match = MatchGame::where('id', $request->match_id)->first();
        if($match != null){
        
            //check if this predictions is already made
        $prediction = Prediction::where('match_id', $request->match_id)->where('slip_id', $request->slip_id)->first();
        if($prediction != null){
            return response()->json($prediction);
        } 

        $prediction = new Prediction();
        $prediction->match_id = $request->match_id;
        $prediction->slip_id = $request->slip_id;
        $prediction->game_id = $request->game_id;
        $prediction->league = $request->league;
        $prediction->bet_type = $request->bet_type;
        $prediction->prediction = $request->prediction;
        $prediction->odd = $request->odd;
        $prediction->save();
        $predicted = Prediction::where('id', $prediction->id)->first();
        return response()->json($predicted);
        } return response()->json('Match not found');
    }


    // seed database with first Game
    public function seedGame(Request $request){
        $number = $request->number;
    
        // create game
        $game = Game::create([]);
        $gameID = Game::where('id', $game->id)->first();
        // create slips
        $new_slip = Slip::factory()->count(1)->create(['game_id' => $gameID->id ]);

        return response()->json($new_slip);

        return response()->json('Game not found');

    }



     //make half time home win prediction
     public function half_time_home(Request $request){
        $match = MatchGame::where('match_id', $request->match_id)->first();
        // $odd = Odd::where('match_id', $request->match_id)->first();
        //get odd where bet_type and match_id from odd table
        $odd = Odd::where('match_id', $request->match_id)->where('bet_type', $request->bet_type)->first();
        // $user = User::where('id', $request->user_id)->first();
        $slip = Slip::where('slip_id', $request->slip_id)->first();

        $response = [
           
            "status" => "success",
            "message" => " home win odd for match_id 1",
            "odd" => $odd,
            "match" => $match

        ];

        return response()->json($response);

        // $prediction = new Prediction();
        // $prediction->prediction_id = '1';
        // $prediction->slip_id = '1';
        // $prediction->match_id = '1';
        // $prediction->bet_type = $request->bet_type;
        // $prediction->home_score = '1';
        // $prediction->away_score = '0';
        // $prediction->prediction = 'half_time_home';
        // $prediction->odd = '2.5';
        // $prediction->start_time = '2021-12-23 12:00:00';
        // $prediction->end_time = '2021-12-23 12:00:00';
        // $prediction->save();




        // if($match->half_time_home > $match->half_time_away){
        //     $prediction->result = true;
        //     $prediction->save();
        //     $user->balance = $user->balance + ($odd->half_time_home * $slip->stake);
        //     $user->save();
        // }else{
        //     $prediction->result = false;
        //     $prediction->save();
        //     $user->balance = $user->balance - $slip->stake;
        //     $user->save();
        // }

     }

     public function half_time_result(){
        //match 1 half time home win
        // $homeWin = DB::table('matches')
        // ->select('home')
        // ->where('match_id', '=', 1)
        // ->first();
        $prediction = new Prediction();
        $prediction->prediction_id = '1';
        $prediction->slip_id = '1';
        $prediction->match_id = '1';
        $prediction->bet_type = 'half_time_home';
        $prediction->home_score = '1';
        $prediction->away_score = '0';
        $prediction->league = 'EPL';
        $prediction->prediction = 'half_time_home';
        $prediction->odd = '2.5';
        $prediction->start_time = '2021-12-23 12:00:00';
        $prediction->end_time = '2021-12-23 12:00:00';
        $prediction->save();

        //match 2  home win
        $prediction = new Prediction();
        $prediction->prediction_id = '2';
        $prediction->slip_id = '1';
        $prediction->match_id = '2';
        $prediction->bet_type = 'full_time_home';
        $prediction->home_score = '1';
        $prediction->away_score = '0';
        $prediction->league = 'EPL';
        $prediction->prediction = 'full_time_home';
        $prediction->odd = '2.5';
        $prediction->start_time = '2021-12-23 12:00:00';
        $prediction->end_time = '2021-12-23 12:00:00';
        $prediction->save();


     }

     public function testMatch(Request $request){

        if($request->url =! null || $request->url =! ''){
            $url = $request->url;
            $data = [
                'url' => $url,
                'message' => "this is how json data comes from laravel"
            ];
            return response()->json($data);
     }
     return response()->json([
         'message' => "this is how json data comes from laravel"
     ]);
    }

    //created deleteCache function
    public function deleteCache(){
        Cache::flush();
        return response()->json('Cache deleted');
    }
}
