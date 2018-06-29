<?php

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/home', function () {
    return redirect('/');
});

Route::get('/music', function () {
    return view('music');
})->name('sound');

Auth::routes();

Route::resource('tasks', 'TasksController');
Route::post('/tasks/markAsDone/{id}', 'TasksController@markAsDone');
Route::post('/tasks/markAsUndone/{id}', 'TasksController@markAsUndone');

Route::get('lang/{lang}', ['as'=>'lang.switch', 'uses'=>'LanguageController@switchLang']);

Route::get('/test', function() {
    return view('test');
})->name('test');