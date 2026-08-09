<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/{model}', function ($model) {
    return view('customizer', ['model' => $model]);
})->where('model', 'ps5|xbox')->name('customizer');
