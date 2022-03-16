<?php

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

   // return view('welcome');
//});

Auth::routes();



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/testlist', [App\Http\Controllers\TestController::class, 'index']);

Route::get('/testcreate', [App\Http\Controllers\TestController::class, 'create']);

Route::post('/teststore', [App\Http\Controllers\TestController::class, 'store']);

Route::get('/testshow/{id}', [App\Http\Controllers\TestController::class, 'show']);

Route::get('/testedit/{id}', [App\Http\Controllers\TestController::class, 'edit']);

Route::post('/testupdate/', [App\Http\Controllers\TestController::class, 'update']);

Route::get('/testdelete/{id}', [App\Http\Controllers\TestController::class, 'delete']);

Route::post('/menu', [App\Http\Controllers\TestController::class, 'menu']);


Route::get('/{id?}', [App\Http\Controllers\TestController::class, 'welcome']);
