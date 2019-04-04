@extends('layouts.app')

@section('title', 'Projects')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Projects</div>

                    <div class="card-body">
                        <ul>
                            @foreach($projects as $project)
                                <li>
                                    <h4><a href="projects/{{$project->id}}">{{$project->title}}</a></h4>
                                    <p>{{$project->description}}</p>
                                    <div class="btn-group">
                                        <a class="btn btn-warning" href="projects/{{$project->id}}/edit">Edit</a>
                                        <form action="projects/{{$project->id}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </li>
                            @endforeach
                        </ul>

                        <p>
                            <a class="btn btn-primary" href="/projects/create">Create a new project</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
