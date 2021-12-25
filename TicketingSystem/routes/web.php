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

Route::get('/', 'App\Http\Controllers\ManagerDashboard@index');
Route::post('/add-place', 'App\Http\Controllers\Place@add_place');
Route::post('/add-bus', 'App\Http\Controllers\Bus@add_bus');
Route::get('/get-place', 'App\Http\Controllers\Place@get_place');
Route::get('/get-bus', 'App\Http\Controllers\Bus@get_bus');
Route::post('/add-ticket', 'App\Http\Controllers\Ticket@add_ticket');
Route::get('/get-ticket', 'App\Http\Controllers\Ticket@get_ticket');
Route::post('/add-driver', 'App\Http\Controllers\User@add_driver');
Route::get('/get-driver', 'App\Http\Controllers\User@get_driver');

Route::get('/customer', 'App\Http\Controllers\Customer@index');

Route::post('/searchticket', 'App\Http\Controllers\Customer@ticket_search');
Route::get('/ticket_confirmation/{data}', 'App\Http\Controllers\Customer@ticket_confirmation');