<?php

Route::get('/', function () {
    return view('welcome');
});

// ユーザ登録
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

// 認証
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');

//Route::get('data', function(){
 //   return response()->json(['name' => 'yamada']);
//});

//word
Route::post('word/drop_category_change/{id}/{category_id}','WordsController@drop_category_change')-> name('word.edit_cate');
Route::post('word/word_edit/{id}/{contents}','WordsController@word_edit')-> name('word.edit_word');
Route::post('word/store/{content}/{category_id}','WordsController@store')-> name('word.store_word');

//diary
Route::post('diary/store','DiariesController@store')-> name('diary.store_diary');
Route::get('diary/index_2','DiariesController@index_2')-> name('diary.index_2');
// 中略
Route::group(['middleware' => ['auth']], function () {
    Route::resource('users', 'UsersController', ['only' => ['index', 'show']]);
    Route::resource('posts', 'PostsController', ['only' => ['store', 'destroy','index','edit']]);
    Route::resource('words', 'WordsController', ['only' => ['destroy','index','edit']]);
    Route::resource('diaries', 'DiariesController', ['only' => ['destroy','index','edit','store']]);
    Route::get('/', 'PostsController@index');  
});