<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UploadController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Auth Controller Endpoints
Route::prefix("v1")->group(function () {
    Route::post("/login", [AuthController::class, "login"]);
});

Route::get('testing', function(){
    return 'welcome';
});

Route::post('upload-students', [UploadController::class, 'uploadStudent']);

Route::post('upload-parents', [UploadController::class, 'uploadParent']);

Route::post('upload-results', [UploadController::class, 'uploadResult']);

Route::post('upload-pre-students', [UploadController::class, 'uploadPreStudent']);

Route::post('remove-subject', [UploadController::class, 'removeSubject']);

Route::post('migrate-users', [UploadController::class, 'migrateUser']);

Route::post('check', [UploadController::class, 'check']);