<?php

use App\Http\Controllers\ArticleContrller;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ReportArticleController;
use App\Http\Controllers\ReportMessageController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->middleware('auth');

Route::resource('/employee',EmployeeController::class);
Route::resource('/user',UserController::class);
Route::resource('/reportMessage',ReportMessageController::class);
Route::resource('/reportArticles',ReportArticleController::class);
Route::resource('/articles',ArticleContrller::class);
Route::resource('/category',CategoryController::class);

Route::resource('/message',MessageController::class);

Route::get('/report-users',[UserController::class, 'usersReport'])->name('user.repor');

Route::get('/report-user-message/{id}',[ReportMessageController::class, 'showReportByUser'])->name('user.report-message');
Route::get('/report-user-article-{id}',[ReportArticleController::class,'showReportByUser'])->name('user.report-article');


Route::get('/reportMessage/{id}/accepted',[ReportMessageController::class,'acceptedMessage'])->name('reportMessage.accepted');
Route::get('/reportMessage/{id}/rejected',[ReportMessageController::class,'rejectedMessage'])->name('reportMessage.rejected');

Route::get('/reportArticle/{id}/accepted',[ReportArticleController::class,'acceptedArticle'])->name('reportArticle.accepted');
Route::get('/reportArticle/{id}/rejected',[ReportArticleController::class,'rejectedArticle'])->name('reportArticle.rejected');


r
/*
Route::get('/login', [LoginController::class, 'loginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('logout', [LoginController::class, 'logout'])->name('logout');
*/
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
