<?php

use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PressController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\StatusController;
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

Route::get('/login', [DashboardController::class, 'index'])->name('login')->middleware(['guest']);
Route::post('/login', [DashboardController::class, 'login']);
Route::post('/logout', [DashboardController::class, 'logout'])->name('logout');



Route::get('/dashboard', [PostController::class, 'index'])->name('index');
Route::get('/dashboard/add-post', [PostController::class, 'add_post'])->name('addpost');
Route::post('/dashboard/add-post', [PostController::class, 'add_post_request']);
Route::get('dashboard/viewpost', [PostController::class, 'view_post'])->name('viewpost');
Route::get('dashboard/viewpost/edit/{id}', [PostController::class, 'edit'])->name('edit');
Route::post('/dashboard/update/{id}', [PostController::class, 'update'])->name('update');
Route::get('dashboard/viewpost/delete/{id}', [PostController::class, 'delete'])->name('delete');

//setting routes
Route::get('dashboard/setting', [DashboardController::class, 'setting'])->name('setting');
Route::get('dashboard/changename/{id}', [DashboardController::class, 'change_name'])->name('change_name');
Route::post('dashboard/changename/update/{id}', [DashboardController::class, 'update_name'])->name('update_name');
Route::get('dashboard/changepassword', [DashboardController::class, 'change_password'])->name('change_password');
Route::post('dashboard/changepassword/update/{id}', [DashboardController::class, 'update_password'])->name('update_password');
Route::get('dashboard/changeprofile/{id}', [DashboardController::class, 'change_profile'])->name('change_profile');
Route::post('dashboard/changeprofile/update/{id}', [DashboardController::class, 'update_profile'])->name('update_profile');

//admin routes
Route::middleware(['can:isAdmin'])->group(function () {
    Route::get('dashboard/contactus', [ContactUsController::class, 'contactus'])->name('dash');
    Route::get('dashboard/aboutus', [ContactUsController::class, 'aboutus'])->name('about');
    Route::post('dashboard/aboutus', [ContactUsController::class, 'dashabout']);

    Route::get('/dashboard/roles', [RoleController::class, 'index'])->name('role');
    Route::post('/dashboard/roles/delete/{id}', [RoleController::class, 'delete'])->name('role_delete');
    Route::get('/dashboard/roles/admin/{id}', [RoleController::class, 'make_admin'])->name('admin');
    Route::get('/dashboard/roles/moderator/{id}', [RoleController::class, 'make_mod'])->name('moderator');
    Route::get('/dashboard/viewpost/status/{id}/{stat}', [StatusController::class, 'status'])->name('status');

    Route::get('dashboard/roles/adduser', [RoleController::class, 'view_adduser'])->name('view_adduser');
    Route::post('dashboard/roles/adduser', [RoleController::class, 'adduser'])->name('adduser');
});


// Route::resource('/dashboard', PostController::class);

// <--Website Routes--> 

Route::get('/', [WebController::class, 'index']);
Route::get('/contactus', [WebController::class, 'contact'])->name('contact');
Route::post('/contactus', [WebController::class, 'store']);

//Search
Route::get('dashboard/dashboard_search', [SearchController::class, 'admin_search'])->name('admin_search');
Route::get('/search', [SearchController::class, 'search'])->name('search');
Route::get('/news/{id}', [SearchController::class, 'news'])->name('news');

//Press Page
Route::get('/press', [PressController::class, 'index'])->name('press');
//admin
Route::get('/dashpress', [PressController::class, 'dashinterview'])->name('interview');
Route::get('/addinterview', [PressController::class, 'addinterview'])->name('addinterview');
Route::post('/addinterview', [PressController::class, 'postinterview']);
//edit interviews
Route::get('/dashpress/editinterview/{id}', [PressController::class, 'editinterview'])->name('editinterview');
Route::post('/editinterview/{id}', [PressController::class, 'updateinterview'])->name('updateinterview');

Route::get('dashpress/delete/{id}', [PressController::class, 'delete'])->name('pressdelete');


Route::get('/gallery', [GalleryController::class, 'gallery'])->name('gallery');
Route::post('/gallery', [GalleryController::class, 'addgallery']);
