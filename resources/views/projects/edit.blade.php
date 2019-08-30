@extends('layout')

@section('title', 'Edit Project')

@section('content')
    <h1>Edit project</h1>

    <form method="POST" action="/projects/{{ $project->id }}">
        @csrf
        @method("PATCH")
        <div class="form-group">
            <label for="name">Project name</label>
            <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" id="name" aria-describedby="nameHelp" placeholder="Enter project name" value="{{ $project->name }}">
        </div>
        <div class="form-group">
            <label for="description">Project description</label>
            <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" id="description" rows="3" name="description">{{ $project->description }}</textarea>
        </div>
                <div class="row">
        <button type="submit" class="btn btn-primary">Update Project</button>
                </div>
    </form>

    <form method="POST" action="/projects/{{ $project->id }}">
        @csrf
        @method("DELETE")
        <div class="form-row">
            <div class="row">

                <button type="submit" class="btn btn-primary">DELETE Project</button>
            </div>
        </div>
    </form>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
@endsection