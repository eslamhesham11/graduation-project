<?php

use App\Http\Controllers\Api\ImageController;
use App\Http\Controllers\AuthController as ControllersAuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use PharIo\Manifest\AuthorCollection;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'register']);
});

Route::middleware(['jwt-verify'])->group(function () {
    Route::get('/get-data', [ImageController::class, 'getAllData']);
    Route::post('/upload', [ImageController::class, 'uploadImage']);
    Route::delete('/delete-image/{id}', [ImageController::class, 'deleteImage']);
});
