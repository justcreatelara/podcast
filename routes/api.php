<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PodcastController;
use App\Http\Controllers\EpisodeController;
use App\Http\Controllers\AuthController;

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

Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);

Route::get('/podcasts', [PodcastController::class, 'index']);
Route::get('/podcast/{podcast}', [PodcastController::class, 'show']);
Route::get('/episodes', [EpisodeController::class, 'index']);
Route::get('/episode/{episode}', [EpisodeController::class, 'show']);

Route::middleware('auth:sanctum')->group( function () {
    Route::post('/podcast', [PodcastController::class, 'create']);
    Route::put('/podcast/{podcast}', [PodcastController::class, 'update']);
    Route::delete('/podcast/{podcast}', [PodcastController::class, 'delete']);

    Route::post('/episode', [EpisodeController::class, 'create']);
    Route::put('/episode/{episode}', [EpisodeController::class, 'update']);
    Route::delete('/episode/{episode}', [EpisodeController::class, 'delete']);
});


