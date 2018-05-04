@extends('layouts.tasks')

@section('content')
<a href="/tasks/create">Create</a>
@foreach ($tasks as $task)
    {{ $task->title }}
    {{ $task->complete }}
    <a href="/tasks/{{ $task->id }}/edit">Edit</a>
    {{-- <a href="/tasks">Destroy</a> --}}

    <form action="/tasks/markAsDone/{{ $task->id }}" method="POST">
        {{ csrf_field() }}
                            <button class="btn btn-primary" type="submit">Mark As Done</button>
    </form>
    <form action="/tasks/markAsUndone/{{ $task->id }}" method="POST">
        {{ csrf_field() }}
                            <button class="btn btn-default" type="submit">Mark As Undone</button>
    </form>

    <form action="{{action('TasksController@destroy', $task->id)}}" method="POST">
                    {{csrf_field()}}
                    <input name="_method" type="hidden" value="DELETE">
                    <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
@endforeach
@endsection