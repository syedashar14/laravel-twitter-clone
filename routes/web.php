<?php

use App\Http\Controllers\Admin\CommentController as AdminCommentController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\IdeaController as AdminIdeaController;
use App\Http\Controllers\Admin\UserController as AdminUserController;

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

Route::get('lang/{lang}' , function ($lang) {
    app()->setLocale($lang);
    session()->put('locale', $lang);
    return redirect()->route('dashboard');
})->name('lang');

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

/*Route::group(['prefix' => 'ideas', 'as' => 'ideas.'], function () {
    //Here you could also use withoutMiddleware method instead of regrouping
    Route::group(['middleware' => ['auth']], function () {
        Route::get('/{idea}', [IdeaController::class, 'show'])->name('show');
        Route::get('/{idea}/edit', [IdeaController::class, 'edit'])->name('edit');
    });
    Route::post('', [IdeaController::class, 'store'])->name('store');
    Route::delete('/{idea}', [IdeaController::class, 'destroy'])->name('destroy');
    Route::put('/{idea}', [IdeaController::class, 'update'])->name('update');
});*/

//Resource grouping alternate for the above route grouping
Route::resource('ideas', IdeaController::class)->except(['create', 'index', 'show'])->middleware('auth');
Route::resource('ideas', IdeaController::class)->only(['show']);

Route::get('/terms', function () {
    return view('terms');
});

//Route::post('/ideas/{idea}/comment', [CommentController::class, 'store'])->name('ideas.comments.store')->middleware('auth');

//Resource grouping alternate for the above route.
//As we are using the only 1 out of 7 default reouts so we are using the ONLY funciton
Route::resource('ideas.comments', CommentController::class)->only(['store'])->middleware('auth');

Route::resource('users', UserController::class)->only('show');
Route::resource('users', UserController::class)->only('edit', 'update')->middleware('auth');


Route::get('profile', [UserController::class, 'profile'])->middleware('auth')->name('profile');

Route::post('users/{user}/follow', [FollowerController::class, 'follow'])->middleware('auth')->name('users.follow');
Route::post('users/{user}/unfollow', [FollowerController::class, 'unfollow'])->middleware('auth')->name('users.unfollow');

Route::post('ideas/{idea}/like', [LikeController::class, 'like'])->middleware('auth')->name('ideas.like');
Route::post('ideas/{idea}/unlike', [LikeController::class, 'unlike'])->middleware('auth')->name('ideas.unlike');

Route::get('/feed', FeedController::class)->middleware('auth')->name('feed');


Route::middleware(['auth', 'can:admin'])->prefix('/admin')->as('admin.')->group(function () {
    Route::get('', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::resource('users', AdminUserController::class)->only('index');
    Route::resource('ideas', AdminIdeaController::class)->only('index');
    Route::resource('comments', AdminCommentController::class)->only('index', 'destroy');
});
//Route::get('/admin', [AdminDashboardController::class, 'index'])->middleware('auth', 'admin')->name('admin.dashboard');
//Using gate on route level instead of middleware
//Route::get('/admin', [AdminDashboardController::class, 'index'])->middleware('auth', 'can:admin')->name('admin.dashboard');
