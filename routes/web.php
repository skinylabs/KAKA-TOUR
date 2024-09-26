<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/admin', function () {
    return view('backend.app');
})->name('admin');
Route::get('/admin/tour', function () {
    return view('backend.pages.tour.index');
})->name('tour');
