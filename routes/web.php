<?php

use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\KMeansController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('/welcome');
});
Route::get('/login', function () {
    return view('login');
});
Route::get('/register', function () {
    return view('register');
});
Auth::routes();
Route::get('/logout', function () {
    return view('auth.login');
});
Route::get('/home', function () {
    return view('home');
});
Route::get('/isi', function () {
    return view('isi');
})->name('isi');

Route::get('forget-password', [ForgotPasswordController::class, 'showForgetForm'])->name('forget-password');
Route::post('reset-password', [ForgotPasswordController::class, 'updatePassword'])->name('reset-password');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/kmeans', [KMeansController::class, 'kMeans'])->name('kMeans');
Route::get('/edit', function () {
    return view('edit');
});
Route::get('/user', [RegisterController::class, 'store'])->name('store');
Route::get('/profil', [DataController::class, 'showUser'])->name('profil');
Route::get('/profiladmin', [DataController::class, 'showUser2'])->name('profilaadmin');
Route::get('/data/create', [DataController::class, 'create'])->name('data.create');
Route::get('/data/{data}', [DataController::class, 'show'])->name('data.show');
Route::get('/data/{data}/edit', [DataController::class, 'edit'])->name('data.edit');
Route::patch('/data/{data}', [DataController::class, 'update'])->name('data.update');
Route::get('/hasil/{data}', [DataController::class, 'show'])->name('data.show');
Route::get('/hasil/{data}', [KMeansController::class, 'show'])->name('show');
Route::resource('CRUD', DataController::class)->scoped();

Auth::routes();

Route::post('/data', [DataController::class, 'store'])->name('data.store');
Route::get('/data/create', [DataController::class, 'create'])->name('data.create');

Route::get('/data/{data}/edit', [DataController::class, 'edit'])->name('data.edit');
Route::patch('/data/{data}', [DataController::class, 'update'])->name('data.update');
Route::post('/data', [DataController::class, 'store'])->name('data.store');

Route::get('/hasil', [DataController::class, 'index'])->name('hasil');
Route::get('/hasil/{data}', [DataController::class, 'show'])->name('data.show');

Route::get('/hasil/{data}', [DataController::class, 'show'])->name('data.show');
Route::get('/hasil', [DataController::class, 'index'])->name('hasil');
Route::get('/hasiladmin', [DataController::class, 'index2'])->name('hasiladmin');
// Route::middleware(['auth', 'user.type:1'])->group(function () {
// });
// Route::middleware(['auth', 'user-access:user'])->group(function () {


// });
Route::get('admin', function(){
    return view('homeadmin');
})->name('admin')->middleware('admin');


Route::get('user', function(){
    return view('home');
})->name('user')->middleware('user');

Route::delete('/hasiladmin/delete/{data_pengguna}', [DataController::class, 'destroy'])
    ->name('hasiladmin.destroy');

    Route::post('/store-review', [ReviewController::class, 'store'])->name('storeReview');
