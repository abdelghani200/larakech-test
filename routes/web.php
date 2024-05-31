<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('contacts', ContactController::class);

Route::post('/contacts/store-duplicate', [ContactController::class, 'storeDuplicate'])->name('contacts.store.duplicate');
