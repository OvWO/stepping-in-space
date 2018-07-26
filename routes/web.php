<?php
/*
|--------------------------------------------------------------------------
| To do
|--------------------------------------------------------------------------
||
| Additionally, add code to handle an incorrect 'id' passed in the url.
|
| Change the name of hasLessThanAllowed function to an isLazy. This requires changes in code
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

Auth::routes();

Route::resource('tasks', 'TasksController');
Route::post('/tasks/markAsDone/{id}', 'TasksController@markAsDone');
Route::post('/tasks/markAsUndone/{id}', 'TasksController@markAsUndone');
Route::post('/tasks/toggleComplete/{id}', 'TasksController@toggleComplete');

Route::get('lang/{lang}', ['as'=>'lang.switch', 'uses'=>'LanguageController@switchLang']);

Route::get('/test', function() {
    return view('test');
})->name('test');