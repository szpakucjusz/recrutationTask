@extends('layout')

@section('content')
    @include('task._partials.menu')

    <div>
        <table>
            <caption>Tasks</caption>
            <tr>
                <td>id</td>
                <td>name</td>
                <td>priority</td>
                <td>created at</td>
                <td>updated at</td>
                <td>edit task</td>
                <td>delete task</td>
            </tr>
            @foreach($tasks as $task)
            <tr>
                <td>{{ $task->id }}</td>
                <td>{{ $task->name }}</td>
                <td>{{ $task->priority }}</td>
                <td>{{ $task->created_at }}</td>
                <td>{{ $task->updated_at }}</td>
                <td><a href="task/{{ $task->id }}/edit">Edit</a></td>
                <td>
                    <form method="POST" action="task/{{ $task->id }}">
                        @method('DELETE'){{ csrf_field() }}
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
@endsection
