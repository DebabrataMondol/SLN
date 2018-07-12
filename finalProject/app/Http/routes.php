<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Authentication Routes
Route::get('auth/login', ['as' => 'login', 'uses' => 'Auth\AuthController@getLogin']);
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', ['as' => 'logout', 'uses' => 'Auth\AuthController@getLogout']);

// Registration Routes
Route::get('auth/register', 'Auth\AuthController@getRegister')->name('register');
Route::post('auth/register', 'Auth\AuthController@postRegister');

// Password Reset Routes
Route::get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');
Route::post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
Route::post('password/reset', 'Auth\PasswordController@reset');

//Categories
Route::resource('admin/categories', 'CategoryController', ['except' => ['create']]);

//Tags
Route::resource('admin/tags', 'TagController', ['except' => ['create']]);
Route::resource('tags', 'UserTagController', ['except' => ['create']]);
//Route::get('/admin/tags','TagController@index1');

// Comments
Route::post('comments/{post_id}', ['uses' => 'CommentsController@store', 'as' => 'comments.store']);
Route::get('comments/{id}/edit', ['uses' => 'CommentsController@edit', 'as' => 'comments.edit']);
Route::put('comments/{id}', ['uses' => 'CommentsController@update', 'as' => 'comments.update']);
Route::delete('comments/{id}', ['uses' => 'CommentsController@destroy', 'as' => 'comments.destroy']);
Route::get('comments/{id}/delete', ['uses' => 'CommentsController@delete', 'as' => 'comments.delete']);
Route::get('comments/{id}/like', 'CommentsController@getLikes');


Route::get('blog/{slug}', ['as' => 'blog.single', 'uses' => 'BlogController@getSingle'])->where('slug', '[\w\d\-\_]+');
Route::get('blog', ['uses' => 'BlogController@getIndex', 'as' => 'blog.index']);
Route::get('contact', 'PagesController@getContact');
Route::post('contact', 'PagesController@postContact');
Route::get('about', 'PagesController@getAbout');
Route::get('/', 'PagesController@getIndex');
//Route::get('/', 'PagesController@getIndex');
Route::resource('posts', 'PostController');

Route::get('blog/like', 'BlogController@getLikes');
Route::get('blog/dislike', 'BlogController@getLikes');
Route::get('like', 'BlogController@getLikes');
Route::get('dislike', 'BlogController@getLikes');


//admin

//Route::get('admin/home', function (){
//   return view('admin.home');
//});

//admin
Route::get('/admin','AdminController@admin');
Route::get('/admin/users', 'AdminController@users');
Route::get('banUser', 'AdminController@banUser');


//profile
Route::get('/profile/{slug}','ProfileController@index');
Route::get('/changePhoto','ProfileController@changePhoto');
Route::post('/uploadPhoto','ProfileController@uploadPhoto');
Route::get('editProfile', 'ProfileController@editProfileForm')->name('editProfile');
Route::post('/updateProfile', 'ProfileController@updateProfile');
Route::get('/findStudents', 'ProfileController@findStudents');
Route::get('/findTeachers', 'ProfileController@findTeachers');

//teacher
Route::get('/teacher', 'TeacherController@index');
//Route::get('/teacher/addQuestion', 'TeacherController@addQuestion');
//Route::post('/teacher/addQuestion', 'TeacherController@addQuestion');

//Ques

Route::get('/questions/add', 'QuestionController@addQuestions');
Route::post('/questions/add', 'QuestionController@storeQuestions');
Route::get('questions/questionList', 'QuestionController@showQuestions');
Route::get('questions/detailQuestionList/{id}', 'QuestionController@showDetailQuestions');
Route::get('questions/editQuestion/{id}', 'QuestionController@editQuestions');
Route::post('questions/updateQuestion', 'QuestionController@updateQuestions');
Route::get('/questions/questionDelete/{id}', 'QuestionController@getDeleteQuestion');


Route::post('questions/unpublished', 'QuestionController@unpublishedQuestions')->name('unpublished-questions');
Route::post('questions/published', 'QuestionController@publishedQuestions')->name('published-questions');


//exam

Route::get('/exam/home','ExamController@index');
Route::post('/exam/showExamTest','ExamController@showQuestions');
Route::post('/exam/showResults','ExamController@showResult');























































































//Route::group(['middleware' => ['web']], function (){
//    Route::get('blog/{slug}', ['as' => 'blog.single', 'uses' => 'BlogController@getSingle'])->where('slug', '[\w\d\-\_]+');
//    Route::get('contact', 'PagesController@getContact');
//    Route::get('about', 'PagesController@getAbout');
//    Route::get('/', 'PagesController@getIndex');
//    Route::resource('posts', 'PostController');
//});

//Route::get('/', function () {
//    return view('welcome');
//});