<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<link href="{{ asset('css/layouts.css') }}" rel="stylesheet">

<div class="wrapper bg-img" >
  <header id="header">
    <div class="header-content">
        <h1>New Users</h1>
            {{ $newUsers }}
        @foreach ($newUsers as $user)
            <h2>User:</h2>
            <h3>Name: {{ $user->name }}</h3>
            <h3>Email: {{ $user->email }}</h3>
        @endforeach
    </div>
  </header>
</div>
