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
        Route::resource('b01', 'AuthController');
        Route::resource('b02', 'DashboardController');
        Route::resource('b03', 'UsersController');
        Route::resource('b04', 'CategoriesController');
        Route::resource('b05', 'PostsController');
        Route::resource('b06', 'CustommersController');
        Route::resource('b07', 'FaqController');
        Route::resource('b08', 'ContactController');
        Route::resource('b09', 'ThemesController');
        Route::resource('b10', 'LinksController');
        Route::resource('b11', 'RolesController');
    });
});


// Public Routes
Route::get('feedback',  'PagesController@getFeedback');
Route::post('feedback', 'PagesController@saveFeedback');
Route::get('terms',     'PagesController@terms');
Route::get('privacy',   'PagesController@privacy');
Route::get('faqs',      'PagesController@faqs');
Route::get('about',     'PagesController@about');

Route::get('/f01',      'HomeController@index');
Route::get('/f02',      'PostsController@index');
Route::get('/f03',      'RemindersController@getRemind');
Route::get('/f04',      'AuthController@getLogin');
Route::get('/f05',      'ContactController@index');
Route::get('/f06',      'SearchController@index');


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