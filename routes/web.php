<?php
/*
|--------------------------------------------------------------------------
| To do
|--------------------------------------------------------------------------
|
| Additionally, add code to handle an incorrect 'id' passed in the url for API and Web.
|
| Search if there's a cleaner way to add the additional messages to the API calls
|
| Make code clean up in TasksController.php
|
| Make CSS cleanup along with new Navbar
|
| Make a React Component and learn if it will be with WebSockets
|
| Add Queues, Redis and Horizon
|
| Add Login with Socialite
|
| Add send email or message functionality
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
Route::get('/download/cv', 'HomeController@downloadCV')->name('downloadCV');

Route::get('lang/{lang}', ['as'=>'lang.switch', 'uses'=>'LanguageController@switchLang']);

Route::get('/test', function () {
    return view('test');
})->name('test');
