<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AlbumController;

Route::get('/login', function () {
    return view('components.login');
})->name('login');

Route::get('/home', function () {
    return view('components.home');
})->name('home');

Route::get('/upload', function () {
    return view('components.upload');
})->name('upload');

Route::get('/my-profile', function () {
    if (Auth::check()) {
        return redirect('/artist/' . Auth::user()->user_id);
    } else {
        return redirect('/login');
    }
});

Route::get('/album/{album_name}', [AlbumController::class, 'viewAlbum'])->name('view-album');
Route::get('/artist/{username}', [UserController::class, 'viewAlbums'])->name('view-artist');

Route::post('/login', [UserController::class, 'login'])->name('login');
Route::post('/signup', [UserController::class, 'signup'])->name('signup');
Route::post('/upload', [AlbumController::class, 'uploadAlbum'])->name('upload-album');