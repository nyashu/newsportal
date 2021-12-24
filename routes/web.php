<?php

use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\WebController;
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

// Route::post('/dashboard/logout', [DashboardController::class, 'logout'])->name('logout');

Route::get('/dashboard', [PostController::class, 'index'])->name('index');
Route::get('/dashboard/add-post', [PostController::class, 'add_post'])->name('addpost');
Route::post('/dashboard/add-post', [PostController::class, 'add_post_request']);

Route::get('dashboard/viewpost', [PostController::class, 'view_post'])->name('viewpost');

Route::get('dashboard/viewpost/edit/{id}', [PostController::class, 'edit'])->name('edit');
Route::post('/dashboard/update/{id}', [PostController::class, 'update'])->name('update');
Route::get('dashboard/viewpost/delete/{id}', [PostController::class, 'delete'])->name('delete');


// Route::resource('/dashboard', PostController::class);

// <--Website Routes--> 

Route::get('/', [WebController::class, 'index']);




Route::get('dashboard/contactus', [ContactUsController::class, 'contactus'])->name('dash');
Route::get('dashboard/aboutus', [ContactUsController::class, 'aboutus'])->name('about');
Route::post('dashboard/aboutus', [ContactUsController::class, 'dashabout']);
// //For User
Route::get('/contactus', [ContactUsController::class, 'index'])->name('contact');
Route::post('/contactus', [ContactUsController::class, 'store']);