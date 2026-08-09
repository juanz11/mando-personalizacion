<?php

use Illuminate\Support\Facades\Route;

Route::get('/{model?}', function ($model = 'ps5') {
    $model = in_array($model, ['ps5', 'xbox']) ? $model : 'ps5';
    return view('customizer', ['model' => $model]);
})->where('model', 'ps5|xbox');
