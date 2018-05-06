@extends('layouts.tasks')

@section('content')
@include('layouts.navbar')
<div class="wrapper bg-img">
  <div class="login-box" style="height: 610px;">
    <i class="fa fa-user-plus avatar" aria-hidden="true"></i>
    <h1>{{ __('Register') }}</h1>
    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
      {{ csrf_field() }}

      <label for="name">{{ __('Name') }}</label>
      <input type="text" name="name" placeholder="Enter Email" value="{{ old('email') }}" required autofocus>
      <label for="email">Email</label>
      <input type="email" name="email" placeholder="Enter Email" value="{{ old('email') }}" required >
      <label for="password">Password</label>
      <input type="password" name="password" placeholder="Enter Password" required>
      <label for="password-confirm">{{ __('Confirm Password') }}</label>
      <input type="password" name="password_confirmation" placeholder="Enter Password Again" required>
      <button type="submit">Register <i class="fas fa-sign-in-alt"></i></button>
      <a href="{{ route('login') }}">Already have an account?</a>
    </form>
  </div>
</div>


@endsection
