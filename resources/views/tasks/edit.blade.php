@extends('layouts.tasks')

@section('content')
<div class="wrapper bg-img">
  <div id="tasks-div">
   <h1>Editing task #{{ $task->id }}from {{ $task->title }} to:</h1>

    <form action="{{action('TasksController@store', $task->id)}}" method="POST">
     {{ csrf_field() }}
     {{ method_field('PUT') }}
          <div>
            <label for="title">Title</label>
            <input type="hidden" name="id" value="{{ $task->id }}">
            <input type="text" class="form-control" id="title" name="title" value="{{ $task->title }}">
              <button type="submit">Save changes</button>
          </div>
          @include('partials.errors')
    </form>
    </div>
</div>
@endsection