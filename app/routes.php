<?php

// ID's accross all routes should be integers (parameter constraints on a global level)
// Regex \d+ means 1 or more digits
Route::pattern('id', '\d+');

// Filter every POST, PUT, DELETE request for the CSRF token (Pattern based Filter)
Route::when('*', 'csrf', ['post', 'put', 'delete']);

// ============================= PUBLIC ROUTER ==============================
// TẤT CẢ ĐỀU CÓ THÊ TRUY CẬP
Route::get('feedback',          'PagesController@getFeedback');
Route::post('feedback',         'PagesController@saveFeedback');
Route::get('terms',             'PagesController@terms');
Route::get('privacy',           'PagesController@privacy');
Route::get('faqs',              'PagesController@faqs');
Route::get('about',             'PagesController@about');
Route::get('page-building',     'PagesController@pageBuilding');


Route::get('/',                 'HomeController@index');// f01
Route::get('home',              'HomeController@index');// f01
Route::get('f03',               'RemindersController@getRemind');
Route::get('f04',               'AuthController@login');
Route::resource('contact',      'ContactController');// f05
Route::get('f06',               'SearchController@index');
Route::post('f06/search',       ['as' => 'f06.search', 'uses' => 'SearchController@search']);
Route::post('f06/searchAjax',   ['as' => 'f06.searchAjax', 'uses' => 'SearchController@searchAjax']);
Route::get('page/{slug}',       'PagesController@show');// f07
Route::get('hoi-dap/ask-question',  'FaqController@askQuestion');// f08, f09, f10
Route::post('f08',              ['as' => 'f08.sendQuestion', 'uses' => 'FaqController@sendQuestion']);
Route::get('hoi-dap/{id}',      'FaqController@show');// f08, f09, f10
Route::get('hoi-dap',           'FaqController@index');// f08, f09, f10
Route::get('post/{slug}',       'PostsController@show');// f02
Route::get('posts',             'PostsController@index');// f11
Route::get('posts/category/{id}',          'PostsController@postsForCategory');


//====================== CHỈ GUEST MỚI ĐƯỢC TRUY CẬP
Route::group(['before' => 'guest'], function()
{
    Route::get('login',              'AuthController@login');
    Route::post('login',             'AuthController@processLogin');
    Route::get('sign-up',            'AuthController@signUp');
    Route::post('sign-up',           'AuthController@processSignUp');
    Route::get('resend-activation',  'AuthController@resendActivation');
    Route::post('resend-activation', 'AuthController@resendActivationCode');
    Route::get('activate/{code}',    ['as'=>'activate', 'uses' => 'AuthController@activate']);
    Route::controller('password',    'RemindersController');
});

//====================== CHỈ TK ĐÃ ĐĂNG NHẬP MỚI ĐƯỢC TRUY CẬP
Route::group(['before' => 'auth'], function()
{
    
});

// Admin Routes
Route::group(['prefix' => 'admincp', 'namespace' => 'Admin'], function()
{
    //========= CHỈ GUEST MỚI ĐƯỢC TRUY CẬP
    Route::group(['before' => 'guestAdmin'], function() {
        Route::get('',          'AuthController@login');
        Route::post('login', [
            'as' => 'admincp.login', 
            'uses' => 'AuthController@processLogin'
        ]);
    });
    
    Route::group(['before' => 'auth'], function() {
       Route::get('logout',    'AuthController@logout'); 
    });
    
    //========= CHỈ TK ĐÃ ĐĂNG NHẬP VÀ ROLE LÀ ADMIN MỚI ĐƯỢC TRUY CẬP
    Route::group(['before' => 'authAdmin|role:admin'], function()
    {
        Route::resource('dashboard', 'DashboardController'); // b02
        Route::resource('b03', 'UsersController');
        Route::resource('b04', 'CategoriesController');
        Route::post('b05/uploadImage', [
            'as' => 'admincp.b05.uploadImage', 
            'uses' => 'PostsController@uploadImage'
        ]);
        Route::post('b05/uploadFile', [
            'as' => 'admincp.b05.uploadFile', 
            'uses' => 'PostsController@uploadFile'
        ]);
        Route::post('b05/deleteDocument', [
            'as' => 'admincp.b05.deleteDocument', 
            'uses' => 'PostsController@deleteDocument'
        ]);
        Route::resource('b05', 'PostsController');
        Route::post('b06/uploadImage', [
            'as' => 'admincp.b06.uploadImage', 
            'uses' => 'CustomersController@uploadImage'
        ]);
        Route::resource('b06', 'CustomersController');
        Route::resource('b07', 'FaqController');
        Route::resource('b08', 'ContactController');
        Route::post('b09/uploadImage', [
            'as' => 'admincp.b09.uploadImage', 
            'uses' => 'SettingsController@uploadImage'
        ]);
        Route::resource('b09', 'SettingsController');
        // Route::resource('b11', 'RolesController');
        Route::resource('b12', 'PagesController');
    });
});


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

