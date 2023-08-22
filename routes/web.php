<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\JobController;

use App\Http\Controllers\ContactController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\JobApplicationController;
use App\Http\Controllers\CategoryController;


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



Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/home', [HomeController::class, 'redirect']);

Route::get('/', [HomeController::class, 'index']);
Route::get('/', [HomeController::class, 'index2']);
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/post_job', [HomeController::class, 'post_job'])->name('post_job');
Route::get('/job_single/{id}', [HomeController::class, 'job_single'])->name('job_single');
Route::get('/messages', [HomeController::class, 'messages'])->name('messages');
Route::get('/upload_cv', [HomeController::class, 'upload_cv'])->name('upload_cv');
Route::get('/favourites', [HomeController::class, 'favourites'])->name('favourites');
Route::post('/store_cv', [HomeController::class, 'store_cv'])->name('store_cv');
Route::get('/showProfile', [HomeController::class, 'showProfile'])->name('showProfile');


Route::get('/job_view', [JobController::class, 'job_view'])->name('job_view');
Route::get('/create_job', [JobController::class, 'create_job'])->name('create_job');
Route::post('/store_jobs', [JobController::class, 'store_jobs'])->name('store_jobs');
Route::get('/delete_job/{id}', [JobController::class, 'delete'])->name('delete_job');
Route::get('/show_job/{id}', [JobController::class, 'show_job'])->name('show_job');
Route::get('/update_job/{id}', [JobController::class, 'update_job'])->name('update_job');
Route::post('/edit_job/{id}', [JobController::class, 'edit_job'])->name('edit_job');
Route::get('/remove_from_favorites/{id}', [JobController::class, 'removeFromFavorites'])->name('remove_from_favorites');
Route::post('/save-job/{id}', [JobController::class, 'saveJob'])->name('save_job');




Route::get('/contacts', [ContactController::class, 'contacts'])->name('contacts');
Route::post('/contacts', [ContactController::class, 'store'])->name('contact.store');
Route::get('/delete/{id}', [ContactController::class, 'delete'])->name('contact.delete');



Route::get('/users', [UsersController::class, 'users'])->name('users');
Route::get('/delete/{id}', [UsersController::class, 'delete'])->name('users.delete');


Route::get('/applications', [JobApplicationController::class, 'applications'])->name('applications');
Route::post('/apply/{job}', [JobApplicationController::class, 'apply'])->name('apply');
Route::get('/approved/{id}', [JobApplicationController::class, 'approved']);
    Route::get('/canceled/{id}', [JobApplicationController::class, 'canceled']);
    Route::get('view_cv/{userId}', [JobApplicationController::class, 'viewCV'])->name('view_cv');

 
    Route::get('/category', [CategoryController::class, 'category'])->name('category');
    Route::get('/create_category', [CategoryController::class, 'create_category'])->name('create_category');
    Route::post('/store_category', [CategoryController::class, 'store_category'])->name('store_category');
    Route::get('/delete_category/{id}', [CategoryController::class, 'delete'])->name('delete_category');
    Route::get('/update_category/{id}', [CategoryController::class, 'update_category'])->name('update_category');
Route::post('/edit_category/{id}', [CategoryController::class, 'edit_category'])->name('edit_category');

Route::get('/category_single/{name}', [CategoryController::class, 'category_single'])->name('category_single');






   
  
    





