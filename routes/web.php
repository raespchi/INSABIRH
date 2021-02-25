<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\indexController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\UserController;
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

Route::get('/',[indexController::class, 'index' ]);

Auth::routes();

Route::get('/home', [HomeController::class, 'home'])->name('home');

Route::get('download/{id}', [FileController::class, 'show'])->name('downloadfile');

Route::get('/response', function(){
	return view('response');
});

Route::get('activacion/{code}',[UserController::class, 'activate']);

Route::post('complete/{id}',[UserController::class, 'complete']);
