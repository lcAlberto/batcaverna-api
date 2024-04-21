<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// routes/api.php

use App\Http\Controllers\AuthController;

Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);
Route::post('logout', [AuthController::class, 'logout']);
// Route::post('refresh', [AuthController::class, 'refresh']);
Route::post('me', [AuthController::class, 'me']);


Route::middleware('jwt.auth')->group(function () {
    // Rotas protegidas
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('change-password', [AuthController::class, 'changePassword']);
});

Route::resources([
    'characters' => 'Api\v1\CharactersController',
    'teams' => 'Api\v1\TeamsController',
    'squad' => 'Api\v1\SquadsController',
    'mission' => 'Api\v1\MissionsController',
]);

/**search*/
//Characters
Route::get('character/search', 'Api\v1\CharactersController@search');
Route::get('character/squad/{squad}', 'Api\v1\CharactersController@squad');
Route::get('character/mission/{mission}', 'Api\v1\CharactersController@mission');



// Mission
Route::get('mission/search', 'Api\v1\MissionsController@search');
// Mission
Route::get('squad/search', 'Api\v1\SquadsController@search');

/* Assiciate relations */
Route::post('squad-character/character/{character}/squad/{squad}', 'Api\v1\SquadsController@connectSquadCharacter');
Route::post('disassociate-squad-character/character/{character}/squad/{squad}', 'Api\v1\SquadsController@disassociateCharacter');


Route::post('mission-squad/squad/{squad}/mission/{mission}', 'Api\v1\SquadsController@connectMissionSquad');
Route::post('disassociate-mission-squad/squad/{squad}/mission/{mission}', 'Api\v1\SquadsController@disassociateMissionSquad');
