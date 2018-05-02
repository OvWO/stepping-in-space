@extends('layouts.app')

@section('content')
    <h1>Editing</h1>
    {{ $task->title }}
    <form action="{{action('TasksController@update', $task->id)}}"></form>
    <a href="tasks/{{ $task->id }}">DESTROY</a>
    <a href="">INDEX</a>
    <a href="/tasks/create">CREATE</a>

{{--                     <form action="{{ url('tasks/'.$task->id)}}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}

                        <!-- Task Name -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Task</label>
                            <div class="col-sm-6">
                                <input type="text" name="name" id="task-name" class="form-control" value="{{ $task->name }}">
                            </div>
                        </div>

                        <!-- Add Task Button -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-edit"></i>Update Task
                                </button>
                            </div>
                        </div>
                    </form>
 --}}

<h1>Edit</h1>
<form action="{{action('TasksController@update', $task->id)}}" method="POST">
      {{ csrf_field() }}
{{--       <input name="_method" type="hidden" value="PATCH">
 --}}
 {{ method_field('PATCH') }}
      <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" id="title" name="title" required>
{{--         <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
      </div>

{{-- <input type="text" class="form-control" name="my-input" value="{ { old('my-input') }}" placeholder="My input" />
 --}}
      <div class="form-group">
        <button type="submit" class="btn btn-primary">Publish</button>
      </div>
      {{-- @include('partials.errors') --}}
</form>

@endsection