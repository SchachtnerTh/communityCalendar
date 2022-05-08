<?php

use App\Models\Calendar;
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
    return view('kalender2', [
        'calsList' => Calendar::all()->where('valid', 1)->map(function($cal) { return $cal->calcode;})->implode('-')
    ]);
});
