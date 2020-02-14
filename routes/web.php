<?php
if(version_compare(PHP_VERSION, '7.2.0', '>=')) {
    error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
}
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

/*
Route::get('/hello', function () {
    //return view('welcome');
    return '<h1>Hello World</h1>';
});

Route::get('/users/{id}/{name}', function($id, $name){
    return 'This is user '.$name.' with an id of '.$id;
});
*/

Route::get('/', 'PagesController@index')->name('home');
Route::get('/about', 'PagesController@about')->name('about');
Route::get('/become_member', 'PagesController@becomeMember')->name('become_member');
Route::get('/members', 'PagesController@members')->name('members');
Route::get('/projects', 'PagesController@projects')->name('projects');

Route::get('/search', 'PagesController@search')->name('search');

Route::resource('posts', 'PostsController');
Auth::routes(['register' => false]);

Route::get('/dashboard', 'DashboardController@index');
