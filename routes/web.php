<?php
/*
|--------------------------------------------------------------------------
| To do
|--------------------------------------------------------------------------
|
| Make HTML/CSS cleanup along with page refactor of Tasks and Home pages.
| New Navbar and 404 page clean up.
|
| Add tests for EVERYTHING
|
| Add extra projects with links and github
|
| Add Login with Socialite





| Make a React Component and learn if it will be with WebSockets


| Check errors in HomeController

| ((new UserRepository)->hasTasks()) conflict with empty(json_decode())

| Add translations for session and validation messages
*/

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/home', function () {
    return redirect('/');
});

Route::get('/music', function () {
    return view('music');
})->name('music');

Route::get('/download/cv', 'HomeController@downloadCV')->name('downloadCV');
Route::post('/emailLuis', 'HomeController@emailLuis')->name('emailLuis');
Route::get('lang/{lang}', ['as'=>'lang.switch', 'uses'=>'LanguageController@switchLang']);

Auth::routes();

Route::resource('tasks', 'TasksController')->except(['show', 'update']);
Route::put('tasks/{id}', 'TasksController@store')->name('tasks.update');
Route::post('/tasks/toggleComplete/{id}', 'TasksController@toggleComplete');


Route::get('/test', function () {
    return view('test');
})->name('test');
