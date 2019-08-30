@extends('layout')

@section('title', 'My Projects')

@section('content')
    <h1>Project {{ $project->name }}</h1>
    <div>
        {{ $project->description }}
    </div>
    <a href="/projects/{{ $project->id }}/edit">Edit project</a>

    @if ($project->tasks->count())
        <div class="tasks">
            <h3>Tasks:</h3>
            <ul>
                @foreach ($project->tasks as $task)
                    <form action="/tasks/{{ $task->id }}" method="POST">
                        @csrf
                        @method("PATCH")
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="taskCheckbox{{ $task->id }}" onclick="this.form.submit();" name="completed" {{ $task->completed ? "checked" : "" }}>
                            <label class="custom-control-label {{ $task->completed ? "is-completed" : "" }}" for="taskCheckbox{{ $task->id }}">{{ $task->text }}</label>
                        </div>
                    </form>
                @endforeach
            </ul>
            <h5>
                Add Task
            </h5>
            <form action="/projects/{{ $project->id }}/tasks" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Task name</label>
                    <input type="text" name="text" class="form-control {{ $errors->has('text') ? 'is-invalid' : '' }}" id="name" aria-describedby="nameHelp" placeholder="Enter task name" value="{{ old('text') }}">
                </div>
                <button type="submit" class="btn btn-primary">Create Task</button>
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
            </div>
    @endif

    <p style="margin-top:50px;"><a href="/projects">Back to all projects</a></p>
@endsection