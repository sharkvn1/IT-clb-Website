<?php

use App\Http\Controllers\Api\V1\UserController;
use App\Http\Controllers\Api\V1\MajorsController;
use App\Http\Controllers\Api\V1\CoursesController;
use App\Http\Controllers\Api\V1\ProjectsController;
use App\Http\Controllers\Api\V1\ProjectDetailController;
use App\Http\Controllers\Api\V1\TypesController;
use App\Http\Controllers\Api\V1\LanguagesController;
use App\Http\Controllers\Api\V1\FrameworksController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'v1', 'namespace' => 'App\Http\Controllers\Api\V1'], function () {
    Route::post('login', ['uses' => 'UserController@login']);
    Route::post('logout', ['uses' => 'UserController@logout'])->middleware('auth:sanctum');
    Route::get('quantity', ['uses' => 'TasksController@quantity'])->middleware('auth:sanctum');
    Route::get('prjId', ['uses' => 'ProjectMembersController@prjId'])->middleware('auth:sanctum');
});




Route::group(['prefix' => 'v1', 'namespace' => 'App\Http\Controllers\Api\V1'], function () {
    Route::apiResource('members', UserController::class);
    Route::apiResource('majors', MajorsController::class);
    Route::apiResource('courses', CoursesController::class);
    Route::apiResource('types', TypesController::class);
    Route::apiResource('projects', ProjectsController::class);
    Route::apiResource('projectsDetail', ProjectDetailController::class);
    Route::apiResource('languages', LanguagesController::class);
    Route::apiResource('frameworks', FrameworksController::class);
    // Route::post('projectMembers/bulk', ['uses' => 'ProjectMembersController@bulkStore']);
});
