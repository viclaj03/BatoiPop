<?php

use App\Http\Controllers\Api\apiArticleController;
use App\Http\Controllers\Api\LoginController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', [LoginController::class, 'login'])->name('login');
Route::get('articlesUser', [apiArticleController::class, 'articleByUser']);


Route::apiResource('articles',\App\Http\Controllers\Api\apiArticleController::class);
Route::apiResource('categories',\App\Http\Controllers\Api\apiCategoryController::class);
Route::apiResource('users',\App\Http\Controllers\Api\apiUserController::class);
Route::apiResource('valoraciones',\App\Http\Controllers\Api\ValorationController::class);
Route::apiResource('tags',\App\Http\Controllers\Api\apiTagController::class);
Route::apiResource('reportArticles',Api\apiReportArticleController::class);
