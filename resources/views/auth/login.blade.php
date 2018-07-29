@extends('layouts.tasks')
@section('content')
@include('layouts.navbar')
<div class="wrapper bg-img">
  <div class="login-box">
    <i class="fa fa-user avatar" aria-hidden="true"></i>
    <h1>{{ __('auth.login') }}</h1>
    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
      {{ csrf_field() }}
      <label for="email">{{ __('auth.email') }}</label>
      <input type="email" name="email" placeholder="{{ __('auth.enterEmail') }}" value="{{ old('email') }}" autofocus>
      @if ($errors->has('email'))
        <span class="help-block">
          <strong>{{ $errors->first('email') }}</strong>
        </span>
      @endif
      <label for="password">{{ __('auth.password') }}</label>
      <input type="password" name="password" placeholder="{{ __('auth.enterPassword') }}" >
      @if ($errors->has('password'))
        <span class="help-block">
          <strong>{{ $errors->first('password') }}</strong>
        </span>
      @endif
      <button type="submit">{{ __('auth.login') }} <i class="fas fa-sign-in-alt"></i></button>
      {{-- <a href="{{ route('password.request') }}">Forgot your password?</a><br> --}}
      <a href="{{ route('register') }}">{{ __('auth.want-an-account') }}</a>
      @include('partials.errors')
    </form>
  </div>
</div>
@endsection
