@extends('layout')

@section('content')
    @include('task._partials.menu')
    <div>
        <form method="post" action="/task">
            @method('POST')
            {{ csrf_field() }}
            <div>
                <label for="name">Task Name</label>
                <input type="text" name="name" />
                <label for="name">Task Priority</label>
                <input type="number" name="priority" />
            </div>
            <div>
                <button type="submit">Add!</button>
            </div>
        </form>
    </div>
@endsection
