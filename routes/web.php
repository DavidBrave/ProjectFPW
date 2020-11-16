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

Route::post("/melakukanlogin", "LoginController@Login");
Route::post("/registerpelajar", "LoginController@registerMurid");
Route::post("/registerguru","LoginController@registerPengajar");

Route::get("/changemode", "MainController@darkmode");
Route::get("/logout", "LoginController@logout");
Route::get("/courses", "MainController@courses");
Route::get("/guru_profile", "GuruController@profile");
Route::get("/create_class", "GuruController@createClass");
Route::post("/tambah_kelas", "GuruController@tambahKelas");


Route::get('/murid_home', "HomeController@IndexHomeMurid");
Route::get('/daftar_kelas', "KelasController@indexKelas");
Route::get('/murid_detail_kelas', "KelasController@indexDetail");
Route::get('/murid_detail_kelas_diambil', "KelasMuridController@indexDetailMuridKelas");
Route::get('/kelas_yg_diambil', "KelasMuridController@indexMuridKelas");
Route::get('/murid_profil', "ProfilController@indexProfilMurid");
Route::get('/murid_edit_profil', "ProfilController@indexEditProfilMurid");
Route::get('/murid_ambil_kelas', "KelasMuridController@tambahKeKelasDiambil");
Route::post('/murid_simpan_profil', "ProfilController@simpanProfilMurid");
Route::get('/murid_batal_ajukan_join_les', "KelasMuridController@HapusDariPengajuanJoin");
Route::get('/set_session_kelas', "KelasController@setSessionKelas");
Route::get('/set_session_kelas_diambil', "KelasMuridController@setSessionKelasMurid");
Route::get('/murid_rating_kelas', "KelasMuridController@ratingLes");
Route::get('/murid_keluar_kelas', "KelasMuridController@muridKeluarKelas");
