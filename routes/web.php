<?php

/* client routes */
Route::get('/', 'HomeController@index');
Route::get('/services/{id}', 'ServiceController@read');
Route::get('/documents', 'DocumentController@read');
Route::get('/news', 'NewsController@readAll');
Route::get('/news/{id}', 'NewsController@read');
Route::post('/questions/create', 'QuestionController@store');
Route::post('/orders/create', 'OrderController@store');

Route::get('/CPanel/login', 'AdminController@login')->name('login');
Route::post('/CPanel/login', 'AdminController@store');

Route::group(['middleware' => ['auth']], function () {
    /* CPanel routes*/
    Route::get('/CPanel', 'AdminController@index');
    Route::get('/CPanel/settings', 'AdminController@showSettings');
    Route::get('/CPanel/logout', 'AdminController@logout');

    /* service routes */
    Route::get('/CPanel/all-services', 'ServiceController@showAll');
    Route::get('/CPanel/services/create', 'ServiceController@create');
    Route::post('/CPanel/services/create', 'ServiceController@store');
    Route::post('/CPanel/services/change-state', 'ServiceController@changeState');
    Route::get('/CPanel/services/{id}', 'ServiceController@update');
    Route::post('/CPanel/services/{id}', 'ServiceController@save');

    /* question routes */
    Route::get('/CPanel/questions/{id}', 'QuestionController@read');
    Route::post('/CPanel/questions/{id}', 'QuestionController@save');
    Route::get('/CPanel/all-questions', 'QuestionController@showAll');

    /* news routes */
    Route::get('/CPanel/all-news', 'NewsController@showAll');
    Route::get('/CPanel/news/create', 'NewsController@create');
    Route::post('/CPanel/news/create', 'NewsController@store');
    Route::post('/CPanel/news/change-state', 'NewsController@changeState');
    Route::get('/CPanel/news/{id}', 'NewsController@update');
    Route::post('/CPanel/news/{id}', 'NewsController@save');

    /* order routes */
    Route::get('/CPanel/orders/{id}', 'OrderController@read');
    Route::post('/CPanel/orders/{id}', 'OrderController@save');
    Route::get('/CPanel/all-orders', 'OrderController@showAll');

    /* documents routes */
    Route::get('/CPanel/all-documents', 'DocumentController@showAll');
    Route::get('/CPanel/documents/create', 'DocumentController@create');
    Route::post('/CPanel/documents/create', 'DocumentController@store');
    Route::post('/CPanel/documents/change-state', 'DocumentController@changeState');
    Route::get('/CPanel/documents/{id}', 'DocumentController@update');
    Route::post('/CPanel/documents/{id}', 'DocumentController@save');
});