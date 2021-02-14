<?php

use App\Http\Controllers\Post\{
    PostController
};
use App\Http\Controllers\Skyhub\B2wController;
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
});

Route::get('/posts', [PostController::class, 'index']);

Route::get('/b2w', [B2wController::class, 'index']);

Route::get('/chart', function (){
    return view('chart.index');
});
