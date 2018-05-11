@extends('layouts.tasks')
@section('content')
@include('layouts.navbar')
<div class="wrapper bg-img">
  <div class="login-box">
    <i class="fa fa-user avatar" aria-hidden="true"></i>
    <h1>Log In</h1>
    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
      {{ csrf_field() }}
      <label for="email">Email</label>
      <input type="email" name="email" placeholder="Enter Email" value="{{ old('email') }}" required autofocus> @if ($errors->has('email'))
      <span class="help-block">
<strong>{{ $errors->first('email') }}</strong>
</span> @endif
      <label for="password">Password</label>
      <input type="password" name="password" placeholder="Enter Password" required> @if ($errors->has('password'))
      <span class="help-block">
<strong>{{ $errors->first('password') }}</strong>
</span> @endif
      <button type="submit">Log In <i class="fas fa-sign-in-alt"></i></button>
      <a href="{{ route('password.request') }}">Forgot your password?</a><br>
      <a href="{{ route('register') }}">Want an account</a>
    </form>
  </div>
</div>
@endsection
