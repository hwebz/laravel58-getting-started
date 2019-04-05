<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Services\Twitter;
use Illuminate\Support\Facades\Mail;
use App\Events\ProjectCreated;

class ProjectsController extends Controller
{
    public function __construct() {
        $this->middleware('auth'); // only(string or array), except(string or array)
    }

    public function index() {
        // $projects = \App\Project::all();
        // $projects = Project::all();
        // return $projects;
        // return view('projects.index', [
        //     'projects' => $projects
        // ]);

        /**
         * auth()->id()
         * auth()->user() // user instance
         * auth()->check() // logged in?
         * auth()->guest()
         */
        // $projects = Project::where('owner_id', auth()->id())->get();
        $projects = auth()->user()->projects;

        cache()->rememberForever('stats', function() {
            return ['lessons' => 1300, 'hours' => 5000, 'series' => 300];
        });

        $stats = cache()->get('stats'); // ['lessons']
        dump($stats);

        // Dumps tab in telescope
        dump($projects);
        return view('projects.index', compact('projects'));
    }

    public function create() {
        return view('projects.create');
    }

    public function store() {
        // $validated = request()->validate([
        //     'title' => 'required|min:3',
        //     'description' => ['required', 'min:3', 'max:255']
        // ]);
        $validated = $this->validatedProject();

        $project = Project::create($validated + ['owner_id' => auth()->id()]);
        // Project::create(request(['title', 'description']));
        // Project::create([
        //     'title' => request('title'),
        //     'description' => requset('description')
        // ]);

        // Project::create(request()->all());

        // dd(request(['title', 'description']));

        // dd([
        //     'title' => request('title'),
        //     'description' => request('description')
        // ]);

        // dd(request()->all());

        /*$project = new Project();

        $project->title = request('title');
        $project->description = request('description');

        $project->save();*/

        // return request()->all();

        /**
         * clear cache and restart server
         * php artisan cache:clear
         * php artisan view:clear
         * php artisan route:clear
         * php artisan config:clear
         * php artisan config:cache
         * doing in model hooks Project Model
         */
        // Mail::to($project->owner->email)->send(
        //     new \App\Mail\ProjectCreated($project)
        // );
        event(new ProjectCreated($project));
        return redirect('/projects');
    }

    // public function show($id) {
    //     // $project = Project::find($id);
    //     $project = Project::findOrFail($id);
    //     return view('projects.show', compact('project'));
    // }
    public function show(Project $project, Twitter $twitter) { // when you inject service into param, you have to name your service as full path to your class
        // dd(app('twitter')); // this way we can define custom name (whatever you want)
        // dd($twitter);

        // if ($project->owner_id !== auth()->id()) {
        //     abort(403);
        // }

        // Authorization
        // abort_if($project->owner_id !== auth()->id(), 403);
        // abort_unless(auth()->user()->owns($project), 403);

        // use policy instead of custom restrict - ProjectPolicy
        // $this->authorize('update', $project);
        // if (\Gate::denies('update', $project)) { // allows()
        //     abort(403);
        // }
        // abort_if(\Gate::denies('update', $project), 403);
        // abort_unless(\Gate::allows('update', $project), 403);
        // using middleware in route web.php for authorization

        // auth()->user()->can('update', $project); // cannot()

        return view('projects.show', compact('project'));
    }

    public function edit($id) {
        $project = Project::findOrFail($id);
        return view('projects.edit', compact('project'));
    }

    // public function update($id) {
    //     // dd('hello!');

    //     $project = Project::findOrFail($id);

    //     $project->title = request('title');
    //     $project->description = request('description');

    //     $project->save();

    //     return redirect('/projects');
    // }

    public function update(Project $project) {

        // $project->update(request()->validate([
        //     'title' => 'required|min:3',
        //     'description' => ['required', 'min:3', 'max:255']
        // ]));
        $project->update($this->validatedProject());
        return redirect('/projects');
    }

    // public function destroy($id) {
    //     $project = Project::findOrFail($id);

    //     $project->delete();

    //     return redirect('/projects');
    // }

    public function destroy(Project $project) {

        $project->delete();
        return redirect('/projects');
    }

    public function validatedProject() {
        return request()->validate([
            'title' => 'required|min:3',
            'description' => ['required', 'min:3', 'max:255']
        ]);
    }
}
