<?php

use App\Http\Livewire\Calculator;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/counter', function () {
    // this one do not need name??
    return view('welcome');
});


// error:
// View [layouts.app] not found.
// 1. in resources/views:   must be: layouts
// 2. AppLayout.php: must be  return view('layouts.app');
//  direct use Component:--------- Calculator::class
Route::get('/calculator', Calculator::class,
)->name('calculator');
