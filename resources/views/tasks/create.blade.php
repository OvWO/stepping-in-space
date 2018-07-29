@extends('layouts.tasks')

@section('content')
<h1>Creating</h1>
    <form method="POST" action="/tasks">
      {{ csrf_field() }}
      <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
{{--         <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
      </div>


      <div class="form-group">
        <button type="submit" class="btn btn-primary">Publish</button>
      </div>
      @include('partials.errors')
    </form>
@endsection