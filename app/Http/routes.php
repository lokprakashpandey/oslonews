<?php

//Hub
Route::get('/hubs/index', 'HubsController@index');
Route::get('/hubs/create', 'HubsController@create');
Route::post('hubs/store', 'HubsController@store');
Route::resource('hubs', 'HubsController');