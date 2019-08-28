<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'] ,function() {
    Route::get('/home', 'HomeController@home')->name('home');

    Route::get('/users', 'UserController@showUsers');
    Route::get('/user/edit/{id}', 'UserController@edit');
    Route::post('/user/storeEdit/{id}', 'UserController@editStore');
    Route::get('/user/followinglist', 'UserController@showFollowing');
    Route::get('/user/followerslist', 'UserController@showFollowers');
    Route::get('/user/followinglist/{id}', 'UserController@showOtherUserFollowing');
    Route::get('/user/followerslist/{id}', 'UserController@showOtherUserFollowers');
    Route::get('/user/edit/password/{id}', 'UserController@changePassword');
    Route::post('/user/storePassword/{id}', 'UserController@passwordStore');
    Route::get('/user/profile/{id}', 'UserController@showUser');
    Route::get('/user/follow/{id}', 'UserController@follow');
    Route::get('/user/unfollow/{id}', 'UserController@unfollow');

    Route::get('/lessons', 'LessonController@showLessons');
    // only accept number at {id}
    Route::get('/lessons/content/{id}', 'LessonController@showQuestions')->where('id' , '[0-9]+');
    Route::post('/lessons/content/answer/{id}', 'LessonController@showAnswers');

    Route::get('/lessons/content/new', 'LessonController@newLessons');
    Route::post('/lesson/content/storeLesson', 'LessonController@storeNewLessons');

    Route::get('/lesson/{id}/questions', 'QuestionController@show')->where('id' , '[0-9]+');

    Route::get('/lesson/{id}/questions/create', 'QuestionController@new')->where('id' , '[0-9]+');
    Route::post('/lesson/{id}/questions/storeQuestion/', 'QuestionController@store')->where('id' , '[0-9]+');

});
