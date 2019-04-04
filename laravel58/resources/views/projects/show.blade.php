@extends('layouts.app')

@section('title', 'Projects')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Projects: {{$project->title}}</div>

                    <div class="card-body">
                        @can('update', $project)
                            <h4>Authorized user can see this line</h4>
                        @endcan
                        <p>{{$project->description}}</p>
                        @if($project->tasks->count())
                            <ul class="list-group">
                                @foreach ($project->tasks as $task)
                                    <li class="list-group-item {{$task->completed ? 'is-completed' : ''}}">
                                        <form action="/completed-tasks/{{$task->id}}" method="post">
                                            @if ($task->completed)
                                                @method('DELETE')
                                            @endif
                                            @csrf
                                            {{-- @method('PATCH') --}}
                                            <label for="completed" style="margin:0">
                                                <input type="checkbox" name="completed" onchange="this.form.submit()" {{$task->completed ? 'checked' : ''}}>
                                                {{$task->description}}
                                            </label>
                                        </form>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                        <hr>
                        {{-- add a new task form --}}
                        <form action="/projects/{{$project->id}}/tasks" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="description">New Task</label>
                                <input type="text" class="form-control" name="description" placeholder="New Task">
                            </div>
                            <button type="submit" class="btn btn-primary">Add task</button>
                        </form>

                        @include ('errors')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
