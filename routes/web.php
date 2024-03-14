<?php

use App\Http\Controllers\sign;
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

Route::get('/register', [sign::class,'regPage']);
Route::post('/register', [sign::class, 'register']);
Route::get('/login', [sign::class,'logPage']);
Route::post('/login', [sign::class, 'login']);
Route::get('/logout', [sign::class, 'logout']);
Route::get('/homepage', [sign::class,'homePage']);
Route::post('/homepage', [sign::class,'homePage']);


Route::Get('change', [sign::class,'change']);
Route::Post('change', [sign::class,'changePost']);

Route::get('/article/{id}', [sign::class,'viewArticle'])->name('id');

Route::post('/admin/delete/{id}', [sign::class,'deleteArticle'])->name('id');
Route::get('/admin/delete/{id}', function(){
    return redirect('/login');
});

Route::get('/', function(){
    return view('index');
});


Route::get('admin/logout', [sign::class,'adminLogout']);
Route::get('/admin-login', [sign::class,'adminLogin']);
Route::post('/admin-login', [sign::class,'adminLoginPost']);
Route::get('/admin', [sign::class,'admin']);
Route::get('/admin/new', [sign::class,'adminNew']); 
Route::post('/admin/new', [sign::class,'adminPostArticle']); 
Route::get('/admin/all', [sign::class,'adminAll']); 