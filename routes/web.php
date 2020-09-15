<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'PagesController@welcome');
Route::get('discover-people', 'PagesController@discover_people')->middleware(["auth","verified"]);

Auth::routes(['verify' => true]);
Route::get('login/google', 'Auth\SocialMediaAuthController@redirectToProvider');
Route::get('login/google/callback', 'Auth\SocialMediaAuthController@handleProviderCallback');
Route::get('login/facebook', 'Auth\SocialMediaAuthController@redirectToFbProvider');
Route::get('login/facebook/callback', 'Auth\SocialMediaAuthController@handleFbProviderCallback');


//Post Routes
Route::group(['prefix' => 'post', 'middleware' => ['auth','verified']], function () {
	Route::post('create', 'Post\PostController@create')->name('create-post');
	Route::post('hoot', 'Post\HootController@hoot')->name('hoot-post');
	Route::post('comment', 'Post\CommentsController@add_comment')->name('comments');
	Route::post('delete', 'Post\PostController@delete_post')->name('delete');
	Route::post('edit', 'Post\PostController@edit_post')->name('edit');
	Route::post('readfor_list', 'AutoCompleteController@readfor_list')->name('readfor_list');
});
	Route::get('post/{post_id}', 'PagesController@single_post');
	Route::get('click/{tag_id}', 'PagesController@tags_post');
//End Post Routes


//Profile Routes

Route::group(['prefix' => 'user', 'middleware' => ['auth','verified']], function () {
	Route::get('{user}', 'PagesController@user_profile');
	Route::post('follow', 'Profile\FollowController@follow')->name('follow');
	Route::post('unfollow', 'Profile\FollowController@unfollow')->name('unfollow');
	Route::post('favourite_author', 'Profile\UserFavouritesController@update_author')->name('favourite_author');
	Route::post('favourite_book', 'Profile\UserFavouritesController@update_book')->name('favourite_book');
	Route::post('favourite_quote', 'Profile\UserFavouritesController@update_quote')->name('favourite_quote');

	Route::post('update_profile_pic', 'Profile\ProfileSettingsController@profile_pic')->name('update_profile_pic');
});
//End Profile Routes


//Read all notifications
Route::get('notifications/markAsRead', function(){
	auth()->user()->unreadNotifications->markAsRead();
	return redirect()->back();
})->name('markRead');

//Route Any Unwanted Link
Route::any('{query}', 
  function() { return redirect('/'); })
  ->where('query', '.*');