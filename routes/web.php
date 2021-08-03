<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Sample;

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

Route::any('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::view('/home', 'Home'); /* custom page */

/* retrieve data from table database  */

Route::get('rtable', function () {

  $rtable = DB::table('slot')->pluck('date', 'mondaym', 'mondaye','tuesdaym', 'tuesdaye', 'wednesdaym','wednesdaye');

  return view('rtable', ['date' => $monm]);

});

Route::get('sample', sample::class);
