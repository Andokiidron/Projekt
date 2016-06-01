<?php

Route::get('/', ['uses' => 'ViewController@getIndex']);

Route::post('search', ['uses' => 'ApartmentController@postSearch']);
Route::get('apartment/{apartment_token}', ['uses' => 'ApartmentController@getApartment']);
Route::post('apartment/{apartment_token}/reading', ['uses' => 'ApartmentController@postReading']);





// Authentication
Route::get('signup', ['middleware' => 'guest','uses' => 'AuthController@signup']);
Route::post('signup', ['middleware' => 'guest','uses' => 'AuthController@postSignup']);

Route::get('login', ['middleware' => 'guest','uses' => 'AuthController@login']);
Route::post('login', ['middleware' => 'guest','uses' => 'AuthController@postLogin']);

Route::get('reminder', ['middleware' => 'guest','uses' => 'AuthController@reminder']);
Route::post('reminder', ['middleware' => 'guest','uses' => 'AuthController@postReminder']);
Route::get('password/{token}', ['middleware' => 'guest','uses' => 'AuthController@password']);
Route::post('password', ['middleware' => 'guest','uses' => 'AuthController@postPassword']);

Route::get('logout', ['middleware' => 'auth','uses' => 'AuthController@logout']);





Route::get('dashboard', ['middleware' => 'auth','uses' => 'DashboardController@getDashboard']);

Route::get('account', ['middleware' => 'auth','uses' => 'AccountController@getAccount']);
Route::patch('account', ['middleware' => 'auth','uses' => 'AccountController@postAccount']);

Route::post('house', ['middleware' => 'auth','uses' => 'HouseController@postHouse']);
Route::get('house/{house_id}', ['middleware' => 'auth','uses' => 'HouseController@getHouseId']);
Route::patch('house/{house_id}', ['middleware' => 'auth','uses' => 'HouseController@patchHouseId']);
Route::delete('house/{house_id}', ['middleware' => 'auth','uses' => 'HouseController@deleteHouseId']);

Route::post('house/{house_id}/apartment', ['middleware' => 'auth','uses' => 'HouseController@postApartment']);
Route::get('house/{house_id}/apartment/{apartment_id}', ['middleware' => 'auth','uses' => 'HouseController@getApartment']);
Route::patch('house/{house_id}/apartment/{apartment_id}', ['middleware' => 'auth','uses' => 'HouseController@patchApartment']);
Route::patch('house/{house_id}/apartment/{apartment_id}/reading/{reading_id}', ['middleware' => 'auth','uses' => 'HouseController@patchReading']);
Route::delete('house/{house_id}/apartment/{apartment_id}', ['middleware' => 'auth','uses' => 'HouseController@deleteApartment']);


