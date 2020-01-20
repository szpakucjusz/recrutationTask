@extends('layout')

@section('content')
    @include('task._partials.menu')
    <div class="container">
        <form method="post" action="/task">
            @method('POST')
            {{ csrf_field() }}
            <div>
                @if ($errors->any('name'))
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div>
                    <label for="name">Task Name</label>
                    <input type="text" name="name" />
                </div>
                <div>
                    <label for="priority">Task Priority</label>
                    <input type="number" name="priority" />
                </div>
                <div>
                    <label for="project_id">Join with project</label>
                    <select name="project_id" id="project_id">
                        @foreach($projects as $project)
                        <option value="{{ $project->id }}">{{ $project->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div>
                <button type="submit">Add!</button>
            </div>
        </form>
    </div>
@endsection
