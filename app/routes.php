<?php

// ID's accross all routes should be integers (parameter constraints on a global level)
// Regex \d+ means 1 or more digits
Route::pattern('id', '\d+');

// Filter every POST, PUT, DELETE request for the CSRF token (Pattern based Filter)
Route::when('*', 'csrf', ['post', 'put', 'delete']);


// Admin Routes
// Route::group(['before' => 'auth|role:admin','prefix' => 'admin'], function()
Route::group(['prefix' => 'admincp'], function()
{
    Route::group(['namespace' => 'Admin'], function()
    {
        Route::resource('b01', 'LinksController');
        Route::resource('b02', 'LinksController');
        Route::resource('b03', 'LinksController');
        Route::resource('b04', 'LinksController');
        Route::resource('b05', 'LinksController');
        Route::resource('b06', 'LinksController');
        Route::resource('b07', 'LinksController');
        Route::resource('b08', 'LinksController');
        Route::resource('b09', 'LinksController');
        Route::resource('b10', 'LinksController');
    });
});


// Public Routes
Route::get('feedback',  'PagesController@getFeedback');
Route::post('feedback', 'PagesController@saveFeedback');
Route::get('terms',     'PagesController@terms');
Route::get('privacy',   'PagesController@privacy');
Route::get('faqs',      'PagesController@faqs');
Route::get('about',     'PagesController@about');
Route::get('/f01',      'PagesController@home');
Route::get('/f02',      'PagesController@f02');
Route::get('/f03',      'PagesController@f03');
Route::get('/f04',      'PagesController@f04');
Route::get('/f05',      'PagesController@f05');
Route::get('/f06',      'PagesController@f06');


// Developer Routes
Route::get('hello', 'DevController@hello');

// Display all SQL executed in Eloquent if Debug mode is set to true
/*if (Config::get('app.debug'))
{
    Event::listen('illuminate.query', function($query)
    {
        var_dump($query);
    });
}*/