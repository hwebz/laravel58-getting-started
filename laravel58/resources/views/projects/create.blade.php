@extends('layouts.app')

@section('title', 'New Project')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create a new Project</div>

                    <div class="card-body">
                        <form action="/projects" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" class="form-control {{$errors->has('title') ? 'is-danger' : ''}}" placeholder="Enter project title" value="{{old('title')}}">
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" class="form-control {{$errors->has('description') ? 'is-danger' : ''}}" placeholder="Enter project title">{{old('description')}}</textarea>
                            </div>
                            <button type="submit" class="btn btn-success">Create project</button>

                            @include ('errors')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
