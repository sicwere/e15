<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BmiController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\PredictController;

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
Route::group(['middleware' => 'auth'], function () {
    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/bmi', function () {
        return view('bmi', [
            'bmi' => session('bmi', null),
            'category' => session('category', null),
            'height' => session('height', null),
            'weight' => session('weight', null),
            'units' => session('units', null),
            'categories' => session('categories', null)
        ]);
    });

    Route::get('/predict', function () {
        return view('predict', [
            'targetWeight' => session('targetWeight', null),
            'perMonth' => session('perMonth', null),
            'measure' => session('measure', null),
            'target' => session('target', null),
            'months' => session('months', null),
            'height' => session('height', null),
            'weight' => session('weight', null),
            'units' => session('units', null),
            'noLossMsg' => session('noLossMsg', null)
        ]);
    });

    Route::get('/search', [BmiController::class, 'search']); 
    Route::get('/save', [BmiController::class, 'save']); 
    Route::get('/history', [HistoryController::class, 'history']); 
    Route::get('/delete', [HistoryController::class, 'delete']); 
    Route::get('/project', [PredictController::class, 'project']); 
});