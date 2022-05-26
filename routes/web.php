<?php

use App\Http\Controllers\GroupController;
use App\Models\Calendar;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

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

Route::get('/default-cal', function () {
    return view('kalender2', [
        'calsList' => Calendar::all()->where('valid', 1)->map(function($cal) { return $cal->calcode;})->implode('-')
    ]);
});

Route::get('/test', function () {
    return view('calendar_selection');
});

Route::get('/', function() {
    return view('welcome');
});

Route::get('/install', function () {
    Artisan::call('migrate');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['verified'])->name('dashboard');

Route::get('/groups', [GroupController::class, 'show']);


require __DIR__.'/auth.php';
