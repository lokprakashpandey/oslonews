<?php

//Hub
Route::get('/hubs/create', 'HubsController@create');
Route::resource('hubs', 'HubsController');