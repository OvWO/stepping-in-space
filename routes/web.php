<?php
/*
|--------------------------------------------------------------------------
| To do
|--------------------------------------------------------------------------
|
| Make HTML/CSS cleanup along with page refactor of Tasks and Home pages.
| New Navbar and 404 page clean up.
| Add extra projects with links and github
|
| Add tests for EVERYTHING
|
| Add Login with Socialite Facebook and Google
|
| Make a React Component and learn if it will be with WebSockets



| Add translations for session and validation messages according to documentation

| Add OOP for returning false  my Repositories when null. I
*/

/**
 * Home
 */
Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/home', function () {
    return redirect('/');
});

/**
 * Music page
 */
Route::get('/music', function () {
    return view('music');
})->name('music');

/**
 * No view routes
 */
Route::get('/download/cv', 'HomeController@downloadCV')->name('downloadCV');
Route::post('/emailLuis', 'HomeController@emailLuis')->name('emailLuis');
Route::get('lang/{lang}', ['as'=>'lang.switch', 'uses'=>'LanguageController@switchLang']);

/**
 * Auth routes
 */
Auth::routes();

/**
 * Tasks routes
 */

Route::resource('tasks', 'TasksController')->except(['show', 'update']);
Route::put('tasks/{id}', 'TasksController@store')->name('tasks.update');
Route::post('/tasks/toggleComplete/{id}', 'TasksController@toggleComplete');


/**
 * A route to test my mess
 */
Route::get('/test', function () {
    return view('test');
})->name('test');
