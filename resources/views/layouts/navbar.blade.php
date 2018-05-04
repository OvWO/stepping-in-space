<nav>
  <div class="menu-icon">
    <i class="fa fa-bars fa-2x"></i>
  </div>
  <div class="logo">
    <a href="{{ route('home') }}">WaterWork</a>
  </div>
  <div class="menu">
    <ul>
      <li><a href="{{ route('home') }}"><i class="fas fa-home"></i> Home</a></li>
      @if (Request::path() == '/')
        {{-- <li><a href="#about"><i class="fas fa-question-circle"></i> About</a></li> --}}
        {{-- <li><a href="#portfolio"><i class="fa fa-suitcase" aria-hidden="true"></i> Portfolio</a></li> --}}
        {{-- <li><a href="#contact"><i class="fas fa-address-card"></i> Skills & Contact</a></li> --}}
      @endif
        <li><a href="{{ route('tasks.index') }}"><i class="fas fa-paste"></i> Tasks</a></li>
      @guest
        <li><a href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i> Login</a></li>
        <li><a href="{{ route('register') }}"><i class="fa fa-user" aria-hidden="true"></i> Register</a></li>
      @else
      <li>
        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
              Logout
            </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          {{ csrf_field() }}
        </form>
      </li>
      @endguest
    </ul>
  </div>
</nav>
