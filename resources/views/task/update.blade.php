@extends('layout')

@section('content')
    @include('task._partials.menu')
    <div>
        <form method="POST" action="/task/{{ $task->id }}">
            @method('PUT')
            {{ csrf_field() }}
            @if ($errors->any('name'))
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <label for="name">Task Name</label>
            <input type="text" name="name" value="{{ $task->name }}" />
            <label for="name">Task Priority</label>
            <input type="number" name="priority" value="{{ $task->priority }}" />
            <p>Created at: {{ $task->created_at }}</p>
            <p>Updated at: {{ $task->created_at }}</p>
            <button type="submit">Update</button>
        </form>

    </div>
@endsection
