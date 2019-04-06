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

use Illuminate\Http\Request;

Route::get('/', function (Request $request) {
    // $user = App\User::first();

    // $user->notify(new App\Notifications\SubscriptionRenewalFailed);

    // // $user->notifications->first()->markAsRead(); // ->unreadNotifications;
    // return 'Done';

    // Session
    // return session('name', 'Default value');
    // session(['name' => 'John Doe']);

    // return $request->session()->get('name', 'Default value');

    // $request->flash(); // get all data from previous request

    return view('welcome');
});

Route::get('/projects/create', function() {
    return view('projects.create');
});

Route::post('/projects', function() {
    // validate the project
    // save the project

    // session()->flash('message', 'Your project has been created.');
    // func from app\helpers.php file
    flash('Your project has been created.');

    return redirect('/');
});
