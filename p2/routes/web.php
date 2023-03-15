<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BmiController;
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
    return view('bmi', [
        'bmi' => session('bmi', null),
        'category' => session('category', null),
        'height' => session('height', null),
        'weight' => session('weight', null),
        'units' => session('units', null),
        'categories' => session('categories', null)
    ]);
});

Route::get('/search', [BmiController::class, 'search']);