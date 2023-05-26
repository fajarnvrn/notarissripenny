<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'registerPost'])->name('register');
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginPost'])->name('login');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [HomeController::class, 'index']);
    Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::get('/', function () {
    return view('login');
});


//Route untuk Data PT
Route::get('/pt', 'PTController@pttampil');
Route::post('/pt/tambah','PTController@pttambah');
Route::get('/pt/hapus/{id_pt}','PTController@pthapus');
Route::put('/pt/edit/{id_pt}', 'PTController@ptedit');

//Route untuk Data PT
Route::get('/home', function(){return view('view_home');});

//Route untuk Data CV
Route::get('/cv', 'CVController@cvtampil');
Route::post('/cv/tambah','CVController@cvtambah');
Route::get('/cv/hapus/{id_cv}','CVController@cvhapus');
Route::put('/cv/edit/{id_cv}', 'CVController@cvedit');

//Route untuk Data Waris
Route::get('/waris', 'WarisController@waristampil');
Route::post('/waris/tambah','WarisController@waristambah');
Route::get('/waris/hapus/{id_waris}','WarisController@warishapus');
Route::put('/waris/edit/{id_waris}', 'WarisController@warisedit');

//Route untuk Data Tanah
Route::get('/tanah', 'TanahController@tanahtampil');
Route::post('/tanah/tambah','TanahController@tanahtambah');
Route::get('/tanah/hapus/{id_tanah}','TanahController@tanahhapus');
Route::put('/tanah/edit/{id_tanah}', 'TanahController@tanahedit');