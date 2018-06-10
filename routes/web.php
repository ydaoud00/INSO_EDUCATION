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

Route::get('/about', function () {
    return view('about');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('users', 'UserController');
Route::resource('centers', 'CenterController', ['except' => ['show']]);
Route::resource('subjects', 'SubjectController', ['except' => ['create','show', 'edit', 'update']]);
Route::resource('subjects.files', 'FileController', ['except' => ['create', 'edit', 'update', 'destroy']]);
Route::resource('files.comments', 'CommentController', ['except' => ['index', 'create', 'show', 'edit', 'update', 'destroy']]);
Route::get('/contact', 'ContactController@show');
Route::post('/contact', 'ContactController@mailToAdmin');
Route::get('centers/{type}/{city}', 'CenterController@find');
Route::get('grades/{type}', 'GradeController@find');
Route::get('files/{id}', 'FileController@like');

