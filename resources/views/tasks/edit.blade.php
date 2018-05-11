@extends('layouts.tasks')

@section('content')
<div class="wrapper bg-img">
  <div id="tasks-div">
   <h1>Editing task #{{ $task->id }}from {{ $task->title }} to:</h1>

    <form action="{{action('TasksController@update', $task->id)}}" method="POST">
     {{ csrf_field() }}
     {{ method_field('PATCH') }}
          <div>
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" required>
                        <button type="submit">Save changes</button>

          </div>

          @include('partials.errors')
    </form>
    </div>
</div>
@endsection