<?php
use App\Http\Controllers\MovieController;
use App\Http\Controllers\GenreController;

Route::resource('movies', MovieController::class);
Route::resource('genres', GenreController::class);
