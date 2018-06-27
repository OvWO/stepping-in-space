@extends('layouts.tasks')

@section('content')
@include('layouts.navbar')
<div class="wrapper bg-img">
  <div class="login-box" style="height: 610px;">
    <i class="fa fa-user-plus avatar" aria-hidden="true"></i>
    <h1>{{ __('auth.register') }}</h1>
    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
      {{ csrf_field() }}

      <label for="name">{{ __('auth.name') }}</label>
      <input type="text" name="name" placeholder="{{ __('auth.enterName') }}" value="{{ old('email') }}" required autofocus>
      <label for="email">{{ __('auth.email') }}</label>
      <input type="email" name="email" placeholder="{{ __('auth.enterEmail') }}" value="{{ old('email') }}" required >
      <label for="password">{{ __('auth.password') }}</label>
      <input type="password" name="password" placeholder="{{ __('auth.enterPassword') }}" required>
      <label for="password-confirm">{{ __('auth.passwordConfirmation') }}</label>
      <input type="password" name="password_confirmation" placeholder="{{ __('auth.confirmPassword') }}" required>
      <button type="submit">{{ __('auth.register') }} <i class="fas fa-sign-in-alt"></i></button>
      <a href="{{ route('login') }}">{{ __('auth.have-an-account') }}</a>
    </form>
  </div>
</div>


@endsection
