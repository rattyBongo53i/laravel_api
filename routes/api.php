<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\BetController;
use App\Http\Controllers\API\sampleBetController;
use App\Http\Controllers\API\OddController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrdableController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\FinanceController;
// use App\Http\Controllers\Algtransportandlogistics;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('prediction/{match_id}',  [BetController::class, 'PredictionOdd'])->name('prediction.odd');
Route::post('odd/full-time-result',  [BetController::class, 'oddFulltimeResult'])->name('odd.fulltime.result');

Route::post('gameOdds',  [BetController::class, 'odds'])->name('game.odds');
Route::post('game',  [BetController::class, 'game'])->name('game');

// sample bet controllers
Route::post('insertMatch',  [sampleBetController::class, 'insertMatch'])->name('insertMatch');
Route::post('updateMatch',  [sampleBetController::class, 'updateMatch'])->name('updateMatch');
//get match by id
Route::get('getMatchById/{id}',  [sampleBetController::class, 'getMatchById'])->name('getMatchById');
//get match with uuid
Route::post('getMatchByUuid',  [sampleBetController::class, 'getMatchByUuid'])->name('getMatchByUuid');
Route::get('getOddsWithMatchId/{id}',  [sampleBetController::class, 'getOddsWithMatchId'])->name('getOddsWithMatchId');
Route::get('getMatches',  [sampleBetController::class, 'index'])->name('getMatches');
Route::get('get-all-matches',  [sampleBetController::class, 'getAllMatches'])->name('getAllMatches');
//delete match by id
Route::delete('deleteMatchById/{id}',  [sampleBetController::class, 'destroy'])->name('deleteMatchById');

// insertOdds group
Route::prefix('insertOdd')->group(function () {
Route::post('home_ft',  [sampleBetController::class, 'insertFull_time_home_odd'])->name('insertFull_time_home_odd');
Route::post('draw_ft',  [sampleBetController::class, 'insertFull_time_draw_odd'])->name('insertFull_time_draw_odd');
Route::post('away_ft',  [sampleBetController::class, 'insertFull_time_away_odd'])->name('insertFull_time_draw_odd');
Route::post('dc_home_ft',  [sampleBetController::class, 'insertOdds_doubleChanceHome_full_time'])->name('insertOdds_doubleChanceHome_full_time');
Route::post('dc_ha_ft',  [sampleBetController::class, 'insertOdds_doubleChanceHomeAway_full_time'])->name('insertOdds_doubleChanceHomeAway_full_time');
Route::post('dc_away_ft',  [sampleBetController::class, 'insertOdds_doubleChanceAway_full_time'])->name('insertOdds_doubleChanceAway_full_time');
Route::post('over_15',  [sampleBetController::class, 'insertOdds_over_15_full_time'])->name('insertOdds_over_15_full_time');
Route::post('under_15',  [sampleBetController::class, 'insertOdds_under_15_full_time'])->name('insertOdds_under_15_full_time');
Route::post('over_25',  [sampleBetController::class, 'insertOdds_over_25_full_time'])->name('insertOdds_over_25_full_time');
Route::post('under_25',  [sampleBetController::class, 'insertOdds_under_25_full_time'])->name('insertOdds_under_25_full_time');


});

//make predictions  saveUrl
Route::post('makePrediction',  [sampleBetController::class, 'makePrediction'])->name('makePrediction');
Route::get('predicts/{id}',  [sampleBetController::class, 'PredictionWithMatchId'])->name('PredictionWithMatchId');

//seedGame
Route::post('seedGame',  [sampleBetController::class, 'seedGame'])->name('seedGame');

Route::post('getting_slip', [sampleBetController::class, 'getSlip'])->name('getSlip');
Route::post('saveUrl',  [sampleBetController::class, 'saveUrl'])->name('saveUrl');
//get all odds
Route::get('getAllOdds',  [OddController::class, 'index'])->name('index');
//delete all odds
Route::delete('deleteAllOdds',  [OddController::class, 'deleteAllOdds'])->name('deleteAllOdds');
//delete all matches
Route::delete('deleteMatches',  [sampleBetController::class, 'deleteMatches'])->name('deleteMatches');

Route::get('getMatchOdds/{id}', [sampleBetController::class, 'getMatchesWithOdds'])->name('getMatchesWithOdds');
 //getSlip
Route::get('getSlip/{id}', [sampleBetController::class, 'getSlip'])->name('getSlip');
Route::get('getSlips', [sampleBetController::class, 'getSlips'])->name('getSlips');


Route::get('test-endpoint', [OddController::class, 'dudeAwake'])->name('dudeAwake');
// Route::get('refresh-all-cache', [OddController::class, 'deleteCache'])->name('deleteCache');
Route::get('ordable-index', [OrdableController::class, 'index'])->name('index');
Route::post('ordable-create', [OrdableController::class, 'create'])->name('create');
//getEmployersEmployees
Route::get('getEmployersEmployees/{id}', [OrdableController::class, 'getEmployersEmployees'])->name('getEmployersEmployees');
// getEmployeeById
Route::get('getEmployeeById/{id}', [OrdableController::class, 'getEmployeeById'])->name('getEmployeeById');
//register employer
Route::post('registerEmployer', [OrdableController::class, 'registerEmployer'])->name('registerEmployer');
// login employer
Route::post('loginEmployer', [OrdableController::class, 'loginEmployer'])->name('loginEmployer');
// getEmployers
Route::get('getEmployers', [OrdableController::class, 'getEmployers'])->name('getEmployers');
//onBoardEmployer
Route::post('onBoardEmployer', [OrdableController::class, 'onBoardEmployer'])->name('onBoardEmployer');

//get employer
Route::get('get-ordable-employer', [OrdableController::class, 'getOrdablEmployer'])->name('getOrdablEmployer');

//set OTP
Route::post('setOTP', [OrdableController::class, 'setOTP'])->name('setOTP');
Route::get('getOTP/{email}', [OrdableController::class, 'getOTP'])->name('getOTP');


/************************** ***********
           Royal Streams International
******************************/
Route::prefix('/rsi')->group( function () {
//Auth
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

//student getFeeCategory
Route::get('students', [StudentController::class, 'index']);
Route::get('people', [StudentController::class, 'getPeople']);
Route::get('count', [StudentController::class, 'countPeople']);
Route::get('get-student/{id}', [StudentController::class,'showStudent']);

//finance
Route::get('get-fee-categories', [FinanceController::class, 'getFeeCategory']);
Route::get('get-fees', [FinanceController::class, 'getFees']);
Route::get('get-expenditure', [FinanceController::class, 'getExpenditureBudget']);
Route::post('store-expense', [FinanceController::class,'storeExpense']);
Route::delete('delete-expense/{id}', [FinanceController::class, 'destroyExpense']);
Route::get('refresh-alls-cache', [FinanceController::class, 'deleteCache']);
Route::post('store-invoice', [FinanceController::class,'storeInvoice']);
Route::post('get-invoice', [FinanceController::class,'getInvoiceWithStudentId']);

// Route::get('finance/{id}', [FinanceController::class,'show']);
// Route::post('finance', [FinanceController::class,'store']);
// Route::put('finance/{id}', [FinanceController::class, 'update']);

});
Route::middleware('auth:sanctum')->group(function () {
    Route::get('user', [AuthController::class, 'user']);
    Route::post('logout', [AuthController::class, 'logout']);
});    