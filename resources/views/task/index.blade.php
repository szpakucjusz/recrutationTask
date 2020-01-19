@extends('layout')

@section('metaCsrf')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection
@section('content')
    @include('task._partials.menu')

    <div>
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
                    <td>Move</td>
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
                    <td>
                        <a class="handle">Move</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <script>
        $.ajaxSetup({

            headers: {

                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

            }

        });
        $('table.db tbody').sortable({
            'containment': 'parent',
            'revert': true,
            helper: function(e, tr) {
                var $originals = tr.children();
                var $helper = tr.clone();
                $helper.children().each(function(index) {
                    $(this).width($originals.eq(index).width());
                });
                return $helper;
            },
            'handle': '.handle',
            update: function(event, ui) {
                ids = [];
                $('.id').each(function() {
                    ids.push($(this).html());
                });
                $.post('/tasks/repriority', {'ids' : ids}, function(data) {
                    if(!data.success) {
                        alert('Whoops, something went wrong :/');
                    } else {
                        idsLength = $('.priority').length;
                        $('.priority').each(function() {
                            $(this).html(idsLength);
                            idsLength--;
                        });
                    }
                }, 'json');
            }
        });
        $(window).resize(function() {
            $('table.db tr').css('min-width', $('table.db').width());
        });
    </script>
@endsection
