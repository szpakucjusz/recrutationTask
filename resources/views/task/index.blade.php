@extends('layout')

@section('metaCsrf')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection
@section('content')
    @include('task._partials.menu')

    <div class="container">
        <form method="get" action="/tasks">
            @method('GET')
            {{ csrf_field() }}
            <div>
                <label for="project">select tasks by project</label>
                <select name="project" id="project">
                    @foreach($projects as $project)
                        <option value="{{ $project->id }}">{{ $project->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <button type="submit">select</button>
            </div>
        </form>
        <table class="db">
            <thead>
                <tr>
                    <td>id</td>
                    <td>name</td>
                    <td>priority</td>
                    <td>created at</td>
                    <td>updated at</td>
                    <td>edit task</td>
                    <td>delete task</td>
                    <td>project name</td>
                    <td>Repriority</td>
                </tr>
            </thead>
            <tbody>
            @foreach($tasks as $task)
                <tr>
                    <td class="id">{{ $task->id }}</td>
                    <td>{{ $task->name }}</td>
                    <td class="priority">{{ $task->priority }}</td>
                    <td>{{ $task->created_at }}</td>
                    <td>{{ $task->updated_at }}</td>
                    <td><a href="task/{{ $task->id }}/edit">Edit</a></td>
                    <td>
                        <form method="POST" action="task/{{ $task->id }}">
                            @method('DELETE'){{ csrf_field() }}
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                    <td>{{ $task->project->name }}</td>
                    <td>
                        <a class="handle cursor-grab">Grab&Move</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
