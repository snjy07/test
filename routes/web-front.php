<?php

Use Illuminate\Support\Facades\Route;

Route::group([ 'namespace' => 'Front'], function () {

    Route::get('/', 'HomeController@index')->name('home');
    
});