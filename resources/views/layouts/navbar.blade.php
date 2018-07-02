<nav>
  <div class="menu-icon">
    <i class="fa fa-bars fa-2x"></i>
  </div>
  <div class="logo">
    <a href="{{ route('home') }}">{{ __('nav-header.space') }}</a>
  </div>
  <div class="menu">
    <ul>
      <li><a href="{{ route('home') }}"><i class="fas fa-home"></i> {{ __('nav-header.home') }}</a></li>
        <li><a href="{{ route('tasks.index') }}"><i class="fas fa-paste"></i> {{ __('nav-header.tasks') }}</a></li>
      <li>
        @if ('es' == App::getLocale())
              <a href="{{ route('lang.switch', 'en') }}">🇺🇸 {{'English'}}</a>
        @else
              <a href="{{ route('lang.switch', 'es') }}">🇲🇽 {{'Español'}} {{-- 🇲🇽 --}}</a>
        @endif
      </li>
{{--         <li><a href="{{ route('sound') }}"><i class="fas fa-volume-up"></i> {{ __('nav-header.auditiveDrugs') }}</a></li>
 --}}
         <li><a href="http://leancoding.co/6KS0W4.steppin-in-space"><i class="fas fa-volume-up"></i> {{ __('nav-header.auditiveDrugs') }}</a></li>

      @guest
        <li><a href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i> {{ __('nav-header.login') }}</a></li>
        <li><a href="{{ route('register') }}"><i class="fa fa-user-plus" aria-hidden="true"></i> {{ __('nav-header.register') }}</a></li>
      @else
      <li>
        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
              <i class="fas fa-sign-out-alt"></i> {{ __('nav-header.logout') }}
            </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          {{ csrf_field() }}
        </form>
      </li>
      @endguest
    </ul>
  </div>
</nav>

{{-- <li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        {{ Config::get('languages')[App::getLocale()] }}
    </a>
    <ul class="dropdown-menu">
        @foreach (Config::get('languages') as $lang => $language)
            @if ($lang != App::getLocale())
                <li>
                    <a href="{{ route('lang.switch', $lang) }}">{{$language}}</a>
                </li>
            @endif
        @endforeach
    </ul>
</li> --}}