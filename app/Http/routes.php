<?php
/*
 * Pages
 */
get('/', [
    'uses' => 'PagesController@home',
    'as' => 'home'
]);

/*
 * Registration
 */
get('register', [
    'as' => 'register_path',
    'uses' => 'RegistrationController@create'
]);

post('register', [
    'as' => 'register_path',
    'uses' => 'RegistrationController@store'
]);

/*
 * Sessions
 */
get('login', [
    'as' => 'login_path',
    'uses' => 'SessionsController@create'
]);

post('login', [
    'as' => 'login_path',
    'uses' => 'SessionsController@store'
]);

get('logout', [
    'as' => 'logout_path',
    'uses' => 'SessionsController@destroy'
]);

/*
 * Statuses
 */
get('statuses', [
    'as' => 'statuses_path',
    'uses' => 'StatusesController@index'
]);

post('statuses', [
    'as' => 'statuses_path',
    'uses' => 'StatusesController@store'
]);

post('statuses/{id}/comments', [
    'as' => 'comment_path',
    'uses' => 'CommentsController@store'
]);

/*
 * Users
 */
get('users', [
    'as' => 'users_path',
    'uses' => 'UsersController@index'
]);

get('@{username}', [
    'as' => 'profile_path',
    'uses' => 'UsersController@show'
]);

/**
 * Follows
 */
post('follows', [
    'as' => 'follows_path',
    'uses' => 'FollowsController@store'
]);

delete('follows/{followed}', [
    'as' => 'follow_path',
    'uses' => 'FollowsController@destroy'
]);

/**
 * Password Resets
 */
Route::controller('password', 'RemindersController');