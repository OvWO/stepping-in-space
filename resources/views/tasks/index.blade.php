  @extends('layouts.tasks') @section('content')
<div class="wrapper bg-img">
  <div id="tasks-div">
    <h1>Your Tasks, {{ Auth::user()->name }}</h1>
    <form method="POST" action="/tasks">
      {{ csrf_field() }}
      <div>
        <label for="title">What has to be done?</label>
        <input type="text" class="form-control" id="title" name="title" required>
        <button type="submit" class="btn btn-primary">Publish</button>
      </div>
      @include('partials.errors')
    </form>

    <div id="current-tasks">
    <h2>Current Tasks</h2>
    @foreach ($tasks as $task)
      <div class="task-row">
        <p>{{ $task->title, $task->id }} {{-- {{ $task->complete }} --}}</p>
        <div class="buttons">
          <a href="/tasks/{{ $task->id }}/edit"><button class="edit" type="submit"><i class="fas fa-edit"></i></button></a>
                <form action="/tasks/markAsDone/{{ $task->id }}" method="POST">
        {{ csrf_field() }}
          <button class="check" type="submit"><i class="fas fa-check"></i></button>
        </form>
          <form action="{{action('TasksController@destroy', $task->id)}}" method="POST">
            {{ csrf_field() }}
                    <input name="_method" type="hidden" value="DELETE">

          <button class="delete" type="submit"><i class="fas fa-times"></i></button>
        </form>
        </div>
      </div>
      @endforeach
    </div>
  </div>


@endsection
