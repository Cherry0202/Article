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

//Route::get('/', function () {
//    return view('welcome');
//});

//名前指定なし
//Route::get('articles', 'ArticlesController@index');
//Route::get('articles/create', 'ArticlesController@create');//Getリクエストされたときを考えて
//Route::get('articles/{id}', 'ArticlesController@show');
////DB保存処理
//Route::post('articles', 'ArticlesController@store');
//Route::get('articles/{id}/edit', 'ArticlesController@edit');  // edit
//Route::patch('articles/{id}', 'ArticlesController@update');  // update
//Route::delete('articles/{id}', 'ArticlesController@destroy'); //delete



//// 名前を指定した Route の書き方
//Route::get('/', 'WelcomeController@index')->name('home');
Route::get('contact', 'PagesController@contact')->name('contact');
Route::get('about', 'PagesController@about')->name('about');
//
//Route::get('articles', 'ArticlesController@index')->name('articles.index');
////Getリクエストされたときを考えて
//Route::get('articles/create', 'ArticlesController@create')->name('articles.create');
//Route::get('articles/{id}', 'ArticlesController@show')->name('articles.show');
//Route::post('articles', 'ArticlesController@store')->name('articles.store');
//// edit
//Route::get('articles/{id}/edit', 'ArticlesController@edit')->name('articles.edit');
//// update
//Route::patch('articles/{id}', 'ArticlesController@update')->name('articles.update');
////delete
//Route::delete('articles/{id}', 'ArticlesController@destroy')->name('articles.destroy');

// root を記事一覧に
Route::get('/', 'ArticlesController@index')->name('home');

//コントローラーから勝手にルーティングしてくれるヤベェやつ
Route::resource('articles', 'ArticlesController');
//make:authで自動で作られる
Auth::routes();
//homeが二つあるとややこしいため
//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');


//shoppingcart
Route::get('/demo','DemocartController@demo');

//zipper
//Route::get('/zip', 'ZipController@index');
Route::get('/test','ZipController@index');