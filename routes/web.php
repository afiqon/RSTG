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
Route::group(['middlewareGroups' => ['web']], function () {

    Auth::routes();
    Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
     Route::get('/home', 'CommentController@home')->name('home');
//     Route::get('/home', function () {
//     return view('home');
// })->name('home');

    Route::get('/', function () {
        if (Auth::check()) {
            return redirect("/home");
        }
        else {
              return view('welcome');
        }
    });
    Route::post('/addComment', 'CommentController@addComment')->name('addComment');
 	Route::post('/findComment', 'CommentController@findComment')->name('findComment');
 	Route::post('/deleteComment', 'CommentController@deleteComment')->name('deleteComment');
 	Route::post('/pieChart', 'CommentController@pieChart')->name('pieChart');
    Route::post('/findTg', 'CommentController@findTg')->name('findTg');
    //Tourism Guide
    Route::get('/TourismGuide', 'TGController@TourismGuide')->name('TourismGuide');


});


// Route::get('/home', 'HomeController@index')->name('home');
