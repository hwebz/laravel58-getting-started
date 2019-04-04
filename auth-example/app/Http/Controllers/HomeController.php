<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth'); // ->only(['index', 'store']), except(['', ''])
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Auth::id()
        // $projects = Project::where('owner_id', auth()->id())->get();
        return view('home');
    }
}
