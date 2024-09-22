<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UrlsController;

Route::get('/', function () {
    return view('home', ["shortUrl" => '']);
});


Route::post('/', [UrlsController::class, 'shorten']);

Route::get('/{shortUrl}', [UrlsController::class, 'redirect']);
