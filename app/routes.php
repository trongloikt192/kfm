<?php

// ID's accross all routes should be integers (parameter constraints on a global level)
// Regex \d+ means 1 or more digits
Route::pattern('id', '\d+');

// Filter every POST, PUT, DELETE request for the CSRF token (Pattern based Filter)
Route::when('*', 'csrf', ['post', 'put', 'delete']);

// Guest only Routes
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
        Route::post('b05/uploadImage', ['as' => 'admincp.b05.uploadImage', 'uses' => 'PostsController@uploadImage'] );
        Route::post('b05/uploadFile', ['as' => 'admincp.b05.uploadFile', 'uses' => 'PostsController@uploadFile'] );
        Route::resource('b05', 'PostsController');
        Route::post('b06/uploadImage', ['as' => 'admincp.b06.uploadImage', 'uses' => 'CustomersController@uploadImage'] );
        Route::resource('b06', 'CustomersController');
        Route::resource('b07', 'FaqController');
        Route::resource('b08', 'ContactController');
        Route::post('b09/uploadImage', ['as' => 'admincp.b09.uploadImage', 'uses' => 'SettingsController@uploadImage'] );
        Route::resource('b09', 'SettingsController');
        // Route::resource('b11', 'RolesController');
        Route::resource('b12', 'PagesController');
    });
});


// Public Routes
Route::get('feedback',          'PagesController@getFeedback');
Route::post('feedback',         'PagesController@saveFeedback');
Route::get('terms',             'PagesController@terms');
Route::get('privacy',           'PagesController@privacy');
Route::get('faqs',              'PagesController@faqs');
Route::get('about',             'PagesController@about');
Route::get('page-building',     'PagesController@pageBuilding');


Route::get('/',                 'HomeController@index');
Route::get('f01',               'HomeController@index');
Route::get('f02/{slug}',        'PostsController@show');
Route::get('f03',               'RemindersController@getRemind');
Route::get('f04',               'AuthController@getLogin');
Route::resource('f05',          'ContactController');
Route::get('f06',               'SearchController@index');
Route::post('f06/search',       ['as' => 'f06.search', 'uses' => 'SearchController@search']);
Route::post('f06/searchAjax',   ['as' => 'f06.searchAjax', 'uses' => 'SearchController@searchAjax']);
Route::get('f07/{slug}',        'PagesController@show');
Route::get('f08/ask-question',  'FaqController@askQuestion');
Route::post('f08',              ['as' => 'f08.sendQuestion', 'uses' => 'FaqController@sendQuestion']);
Route::get('f09/{id}',          'FaqController@show');
Route::get('f10',               'FaqController@index');
Route::get('f11',               'PostsController@index');


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


Route::get('/start', function()
{
    $admin = new Role();
    $admin->name = 'Admin';
    $admin->save();
  
    $user = new Role();
    $user->name = 'User';
    $user->save();
  
    $read = new Permission();
    $read->name = 'can_read';
    $read->display_name = 'Can Read Data';
    $read->save();
  
    $edit = new Permission();
    $edit->name = 'can_edit';
    $edit->display_name = 'Can Edit Data';
    $edit->save();
  
    $user->attachPermission($read);
    $admin->attachPermission($read);
    $admin->attachPermission($edit);
 
    $adminRole = DB::table('roles')->where('name', '=', 'Admin')->pluck('id');
    $userRole = DB::table('roles')->where('name', '=', 'User')->pluck('id');
    // print_r($userRole);
    // die();
  
    $user1 = User::where('username','=','imron02')->first();
    $user1->roles()->attach($adminRole);
    $user2 = User::where('username','=','asih')->first();
    $user2->roles()->attach($userRole);
    $user3 = User::where('username','=','sarah')->first();
    $user3->roles()->attach($userRole);
    return 'Woohoo!';
});