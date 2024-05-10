<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\fetch;
Route::get('/', function () {
    return view('welcome');
});


Route::post('/fetch', [Fetch::class, 'fetchLocation'])->name('fetch');