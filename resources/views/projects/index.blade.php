@extends('layout')

@section('title', 'My Projects')

@section('content')
    <h1>All projects</h1>
    <p><a href="/projects/create">Create new project</a></p>
    <ul>
        @foreach ($projects as $project)
            <li><a href="/projects/{{ $project->id }}">{{ $project->name }}</a></li>
        @endforeach
    </ul>
@endsection