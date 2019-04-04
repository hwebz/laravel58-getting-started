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

// Service container and Auto-Resolution
app()->bind('example', function() { // each new instance for each new call
    return new \App\Task;
});
app()->singleton('once', function() { // just 1 instance for multiple calls
    return new \App\Post;
});
app()->singleton('twitter', function() {
    return new \App\Services\Twitter('api key');
});
// app()->singleton('App\Services\Twitter', function() {
//     return new \App\Services\Twitter('another api key');
// });

// app()->bind('\App\Post', function() {
//     dd('called');
//     return new \App\Post;
// });

Route::get('/', 'PagesController@home');
// Route::get('/', function() {
//     // dd(app('example'), app('example'), app('once'), app('once'));
//     // dd(app('foo')); // in AppServiceProvider.php register()
//     // dd(app('\App\Post'));
//     dd(app('\App\Example'));
// });
// Route::get('/', function(App\Providers\Laracasts\Repositories\UserRepository $users, App\Services\Twitter $twitter) {
//     dd($twitter);
//     dd($users);
// });
Route::get('/about', 'PagesController@about');
Route::get('/contact', 'PagesController@contact');
/* Route::get('/', function() {
    $tasks = [
        'Go to the store',
        'Go the the market',
        'Go to work'
    ];

    return view('welcome', [
        'tasks' => $tasks,
        'foo' => '<script>alert("foobar")</script>'
    ]);

    // return view('welcome')->withTasks($tasks)->withFoo('<script>alert("foobar")</script>');

    // return view('welcome')->with([
    //     'tasks' => $tasks,
    //     'foo' => '<script>alert("foobar")</script>'
    // ]);
});

Route::get('/contact', function() {
    return view('contact');
});

Route::get('/about', function() {
    return view('about');
}); */

/*
    GET     /projects           (index)
    GET     /projects/create    (create)
    GET     /projects/1         (show)
    POST    /projects           (store)
    GET     /projects/1/edit    (edit)
    PATCH   projects/1          (update)
    DELETE  projects/1          (destroy)
*/

// Route::get('/projects', 'ProjectsController@index');
// Route::get('/projects/create', 'ProjectsController@create');
// Route::get('/projects/{project}', 'ProjectsController@show');
// Route::post('/projects', 'ProjectsController@store');
// Route::get('/projects/{project}/edit', 'ProjectsController@edit');
// Route::patch('/projects/{project}', 'ProjectsController@update');
// Route::delete('/projects/{project}', 'ProjectsController@destroy');
Route::resource('projects', 'ProjectsController')->middleware('can:update,project'); //project is the route param name

Route::patch('/tasks/{task}', 'ProjectsTaskController@update');
Route::post('/projects/{project}/tasks', 'ProjectsTaskController@store');

Route::post('/completed-tasks/{task}', 'CompletedTasksController@store');
Route::delete('/completed-tasks/{task}', 'CompletedTasksController@destroy');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
