<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;

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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::resources([
        'users' => UserController::class,
        'clients' => ClientController::class,
        'projects' => ProjectController::class,
        'tasks' => TaskController::class
    ], [
        'except' => ['show']
    ]);

});

Auth::routes();
