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

Route::group(['middleware'=>['web']], function(){
    Route::get('blog/{slug}', ['as' =>'blog.single','uses'=>'BlogController@getSingle'])->
    where('slug','[\w\d\-\_]+');

Route::get('index', 'PagesController@getIndex');
Route::get('blog', [
    'uses'=> 'BlogController@getIndex',
    'as' =>'blog.single'
]);

}); 
Route::redirect('/', 'posts');

Auth::routes();
Route::resource('/posts', 'PostController');

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/categories', 'CategoryController');
Route::resource('/tags', 'TagController');