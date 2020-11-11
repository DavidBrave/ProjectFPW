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

Route::get('/', 'MainController@home');
Route::get('/about', 'MainController@about');
Route::get("/login", "LoginController@ShowLogin");
Route::get("/register", "LoginController@showRegister");
Route::post("/register_pengajar", "LoginController@registerPengajar");
Route::post("/register_pelajar", "LoginController@registerPelajar");
Route::post("/login_user", "LoginController@Login");
