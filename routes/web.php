<?php

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
Route::resource('/message',MessageController::class);

Route::get('/report-users',[UserController::class, 'usersReport'])->name('user.repor');

Route::get('/report-user-message/{id}',[ReportMessageController::class, 'showReportByUser'])->name('user.report-message');


Route::get('/report/{id}/accepted',[ReportMessageController::class,'acceptedMessage'])->name('reportMessage.accepted');
Route::get('/report/{id}/rejected',[ReportMessageController::class,'rejectedMessage'])->name('reportMessage.rejected');


/*
Route::get('/login', [LoginController::class, 'loginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('logout', [LoginController::class, 'logout'])->name('logout');
*/
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
