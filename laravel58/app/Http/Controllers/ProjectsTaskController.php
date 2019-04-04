<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Project;

class ProjectsTaskController extends Controller
{
    public function store(Project $project) {
        $validated = request()->validate([
            'description' => 'required'
        ]);
        // Task::create([
        //     'project_id' => $project->id,
        //     'description' => request('description')
        // ]);

        // return back();
        $project->addTask($validated);

        return back();
    }

    public function update(Task $task) {
        // $task->update([
        //     'completed' => request()->has('completed')
        // ]);

        // if(request()->has('completed')) {
        //     $task->complete(request()->has('completed'));
        // } else {
        //     $task->incomplete();
        // }

        $method = request()->has('completed') ? 'complete' : 'incomplete';
        $task->$method();

        return back();
    }
}
