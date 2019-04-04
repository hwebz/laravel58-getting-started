@extends('layouts.app')

@section('title', 'New Project')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit project: {{$project->id}}</div>

                    <div class="card-body">
                            <form action="/projects/{{$project->id}}" method="post">
                            @csrf
                            {{-- {{ method_field('PATCH') }} --}}
                            @method('PATCH')
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" class="form-control {{$errors->has('title') ? 'is-danger' : ''}}" placeholder="Enter project title" value="{{$project->title}}">
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" class="form-control {{$errors->has('description') ? 'is-danger' : ''}}" placeholder="Enter project title">{{$project->description}}</textarea>
                            </div>
                            <button type="submit" class="btn btn-success">Update project</button>

                            @include ('errors')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
