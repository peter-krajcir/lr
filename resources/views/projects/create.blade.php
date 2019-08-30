@extends('layout')

@section('title', 'New Project')

@section('content')
    <h1>Create new project</h1>

    <form method="POST" action="/projects/store">
        @csrf
        <div class="form-group">
            <label for="name">Project name</label>
        <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" id="name" aria-describedby="nameHelp" placeholder="Enter project name" value="{{ old('name') }}">
        </div>
        <div class="form-group">
            <label for="description">Project description</label>
            <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" id="description" rows="3" name="description">{{ old('description') }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
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