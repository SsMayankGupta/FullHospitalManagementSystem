<?php

use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;
use Livewire\Volt\Volt;

Route::get('/', function () {
    return view('indexPage.index');
});

Route::get('/Dashboard', function () {
    return view('dashboard.index');
});


Route::get('/General_Discussion_Dashboard', function () {

    return view('general_discussion_team.index');
});



Route::get('/Pateint_Request_Handling_Dashboard', function () {
    return view('pateint-handling.index');
});
