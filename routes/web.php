<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/frota', function () {
	return "{caro: \"fiat uno\"}";
});
