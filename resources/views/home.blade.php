 {{-- https://safe-atoll-78199.herokuapp.com/ --}}
@extends('layouts.app')
@section('content')

<div class="wrapper">
  <div class="content">
{{--           <h1> {{ Auth::check() ? Auth::user()->email : old('email') }}
          </h1> --}}

    <!-- STARTS ABOUT -->
    <section id="about" class="dark">
      <h2>{{ __('home.about_header') }} <i class="fas fa-question-circle light-green"></i></h2>
      <div class="clearfix">
        <div id="me"></div>
        <div>
            <p>{{ __('home.about1') }}
                <br>
                <br>
                {{ __('home.about2') }}
            </p>
         <div>
             <a href="{{ route('downloadCV') }}" target="_blank"><img src="img/pdf-icon.png" alt="Download CV" id="download">{{-- <br>Download CV --}}</a>
        </div>
        </div>
      </div>
    </section>
    <div class="parallax-image1">
      <div class="parallax-text">
        <span class="border">
        {{ __('home.portfolio') }}
      </span>
      </div>
    </div>
    <!-- ENDS ABOUT -->
    <!-- STARTS PORTFOLIO -->
    <section id="portfolio" class="dark">
      <h2>{{ __('home.projects') }} <i class="fas fa-code blue"></i></h2>
      <ul>
        <li>
          <div class="card">
            <a href="https://github.com/OvWO/ArduinoRoboticArm">
              <img src="img/robotic-arm.jpg" alt="project">
            </a>
            <div class="card-content">
              {{ __('home.arduino') }}
            </div>
          </div>
        </li>
        <li>
          <div class="card">
            <a href="https://github.com/OvWO/Trigonometry-Homework-Solver">
              <img src="img/trigonometry.png" alt="project">
            </a>
            <div class="card-content">
              {{ __('home.python') }}
            </div>
          </div>
        </li>
        <li>
          <div class="card">
            <a href="https://github.com/OvWO/RPi_smart_house">
              <img src="img/smarthouse.jpg" alt="project">
            </a>
            <div class="card-content">
              {{ __('home.smart_house') }}
            </div>
          </div>
        </li>
      </ul>
    </section>
    <!-- ENDS PORTFOLIO -->
    <div class="parallax-image1">
      <div class="parallax-text">
        <span class="border">
        {{ __('home.skillsAndContact') }}</span>
      </div>
    </div>
    <section id="contact">
      <div id="skills">
        <h2>{{ __('home.skills') }} <i class="fas fa-chart-bar purple"></i></h2>
        <p>HTML <i class="fab fa-html5 orange"></i>, CSS <i class="fab fa-css3-alt blue"></i> & JS <i class="fab fa-js yellow"></i></p>
        <div class="container">
          <div class="skills web">80%</div>
        </div>
        <p>Android <i class="fab fa-android light-green"></i></p>
        <div class="container">
          <div class="skills android">40%</div>
        </div>
        <!-- Skills Big Icons -->
          <h3>{{ __('home.various_skills') }}:</h3>
                  <div id="skills-icons">

          <div class="tooltip">
            <span class="tooltiptext">Laravel</span>
            <a href="https://laravel.com/"><img src="img/laravel.png" alt="Laravel"></a>
          </div>
          <div class="tooltip">
            <span class="tooltiptext">Vuejs</span>
            <a href="https://vuejs.org/"><img src="img/vuejs.png" alt="Vuejs"></a>
          </div>
          <div class="tooltip">
            <span class="tooltiptext">React JS & React Native</span>
            <a href="https://reactjs.org/"><img src="img/react.png" alt="React JS"></a>
          </div>
{{--           <div class="tooltip">
            <span class="tooltiptext">Angular JS</span>
            <a href="https://angularjs.org/"><img src="img/angular.png" alt="Angluar JS"></a>
          </div> --}}
          <div class="tooltip">
            <span class="tooltiptext">Bootstrap</span>
            <a href="https://getbootstrap.com/"><img src="img/bootstrap.png" alt="Bootstrap"></a>
          </div>
{{--           <div class="tooltip">
            <span class="tooltiptext">Materilize</span>
            <a href="http://materializecss.com/"><img src="img/materialize.png" alt="Materilize"></a>
          </div> --}}
          <div class="tooltip">
            <span class="tooltiptext">Adobe Illustrator</span>
            <a href="https://es.wikipedia.org/wiki/Adobe_Illustrator"><img src="img/AI.png" alt="Adobe Illustrator"></a>
          </div>
          <div class="tooltip">
            <span class="tooltiptext">Figma</span>
            <a href="https://www.figma.com/"><img src="img/figma.png" alt="Figma"></a>
          </div>
          <div class="tooltip">
            <span class="tooltiptext">PHP</span>
            <a href=""><img src="img/php.svg" alt="PHP"></a>
          </div>
          <div class="tooltip">
            <span class="tooltiptext">MySql</span>
            <a href="https://www.mysql.com/"><img src="img/mysql.png" alt="MySql"></a>
          </div>
          <div class="tooltip">
            <span class="tooltiptext">Git</span>
            <a href="https://git-scm.com/"><img src="img/git.png" alt="Git"></a>
          </div>
          <div class="tooltip">
            <span class="tooltiptext">Python</span>
            <a href=""><img src="img/python.png" alt="Python"></a>
          </div>
{{--           <div class="tooltip">
            <span class="tooltiptext">Machine Learning</span>
            <a href="https://en.wikipedia.org/wiki/Machine_learning"><img src="img/ml.png" alt="Machine Learning"></a>
          </div> --}}
          <div class="tooltip">
            <span class="tooltiptext">Arduino</span>
            <a href="https://www.arduino.cc/"><img src="img/arduino.png" alt="Arduino"></a>
          </div>
          <div class="tooltip">
            <span class="tooltiptext">German (Beginner)</span>
            <a href="https://en.wikipedia.org/wiki/Germany"><img src="img/germany.png" alt="Germany"></a>
          </div>
          <div class="tooltip">
            <span class="tooltiptext">French (Beginner)</span>
            <a href="https://en.wikipedia.org/wiki/France"><img src="img/france.png" alt="France"></a>
          </div>
          <div class="tooltip">
            <span class="tooltiptext">Russian (Beginner)</span>
            <a href="https://en.wikipedia.org/wiki/Russia"><img src="img/russia.png" alt="Russia"></a>
          </div>
          <div class="tooltip">
            <span class="tooltiptext">Spanish (Native)</span>
            <a href="https://en.wikipedia.org/wiki/Mexico"><img src="img/mexico.png" alt="Mexico"></a>
          </div>
        </div>
      </div>
      <div id="contact-me">

        <h2>{{ __('home.contact') }} <i class="fas fa-id-card orange"></i></h2>
        <form method="POST" action="{{ route('emailLuis') }}">
          {{ csrf_field() }}
          <label for="email"><i class="fas fa-envelope light-green"></i> Email:</label>

          <input type="email" name="email" placeholder="Add Translations Your Email" value="{{ Auth::guest() ? old('email') : Auth::user()->email}}">
          <label for="name"><i class="fas fa-user blue"></i> Name:</label>
          <input type="text" name="name" placeholder="Your Name" value="{{ Auth::guest() ? old('name') : Auth::user()->name }}">
          <label for="message"><i class="fas fa-comment purple"></i> {{ __('home.message') }}:</label>
          <textarea name="message" cols="20" rows="8" placeholder="Send me a message..." value="{{ old('message') }}"></textarea>
          <button type="submit"><i class="fas fa-paper-plane"></i> {{ __('home.send_message') }}</button>
          @include('partials.errors')
        </form>
          <div id="social-buttons">
              <ul>
                <li>
                  <a href="https://www.facebook.com/luis.carloslv"><i class="fab fa-facebook-square light-blue"></i></a>
                </li>
                <li>
                    <a href="https://github.com/OvWO"><i class="fab fa-github blue"></i></a>
                </li>
                <li>
                    <a href=""><i class="fab fa-linkedin purple"></i></a>
                </li>
              </ul>
          </div>
      </div>
    </section>
    <div class="parallax-image3">
      <div class="parallax-text">
        <span class="border">
        {{ __('home.bye') }}
      </span>
      </div>
    </div>
  </div>
</div>
@endsection