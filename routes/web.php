<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PostController;

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

Route::get('test', [AdminController::class,"index"]);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::controller(PostController::class)->group
( function(){

Route::middleware('auth')->group(
    function(){
Route::get('posts/trashed',"get_trashed")->name('posts.trashed');

Route::get('posts',"index")->name('posts.index');

Route::get('post/{id}',"show")->name('posts.show');

Route::get('posts/create', "create")->name('posts.create');
Route::post('posts/store', "store")->name("posts.store");

Route::get('posts/edit/{id}', "edit")->name('posts.edit');
Route::post('posts/update/{id}', "update")->name("posts.update");

Route::get('posts/delete/{id}', "destroy")->name('posts.delete');

Route::get('posts/softdelete/{id}', "softdelete")->name('posts.softdelete');

Route::get('posts/restore/{id}', "restore")->name('posts.restore');
Route::get('posts/restoreall', "restoreall")->name('posts.restoreall');
}

);

}
);

Route::controller(ProfileController::class)->group
( function(){
    Route::get('profile',"index")->name('profile.index');
    Route::get('profile/edit',"edit")->name('profile.edit');
    Route::put('profile/update',"update")->name('profile.update');
}

);
