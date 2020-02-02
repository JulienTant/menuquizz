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

Route::resource('groups','GroupController');
Route::resource('meal-types','MealTypeController');
Route::get('meal-types/{mealType}/swap','MealTypeController@swap')->name('meal-types.swap');
Route::get('meals/with-comment', 'MealController@withComment')->name('meals.with-comment');
Route::resource('meals','MealController');

Route::get('quizz', 'QuizzController@index')->name('quizz.index');
Route::get('quizz/create', 'QuizzController@show')->name('quizz.create');
