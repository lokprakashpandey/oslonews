<?php

//Continent
Route::get('/continents/index', 'ContinentsController@index');
Route::get('/continents/create', 'ContinentsController@create');
Route::post('continents/store', 'ContinentsController@store');
Route::resource('continents', 'ContinentsController');

//Country
Route::get('/countries/index', 'CountriesController@index');
Route::get('/countries/create', 'CountriesController@create');
Route::post('countries/store', 'CountriesController@store');
Route::resource('countries', 'CountriesController');

//Hub
Route::get('/hubs/index', 'HubsController@index');
Route::get('/hubs/create', 'HubsController@create');
Route::post('hubs/store', 'HubsController@store');
Route::resource('hubs', 'HubsController');

//Category
Route::get('/categories/index', 'CategoriesController@index');
Route::get('/categories/create', 'CategoriesController@create');
Route::post('categories/store', 'CategoriesController@store');
Route::resource('categories', 'CategoriesController');

