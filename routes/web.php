<?php

use App\Models\Calendar;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\ClistController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\ProfileController;

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

//Route::get('/', function() {
//    return view('welcome');
//});

Route::get('/install', function () {
    Artisan::call('migrate');
});



Route::get('/', [GroupController::class, 'showGroups']);

Route::get('admin/calendars/create', [CalendarController::class, 'create'])->middleware('admin');
Route::post('admin/calendars', [CalendarController::class, 'store'])->middleware('admin');

Route::get('admin/lists/create', [ClistController::class, 'create'])->middleware('admin');
Route::post('admin/lists', [ClistController::class, 'store'])->middleware('admin');

Route::get('admin/groups/create', [GroupController::class, 'create'])->middleware('admin');
Route::post('admin/groups', [GroupController::class, 'store'])->middleware('admin');

Route::get('showlist/{list}', [ClistController::class, 'show']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('verified')->name('dashboard');

Route::group(['middleware' => 'admin'], function() {

    Route::view('profile', 'profile')->name('profile');

    Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::resource('groups', GroupController::class);

    Route::resource('clists', ClistController::class);

    Route::resource('calendars', CalendarController::class);

});

require __DIR__.'/auth.php';
