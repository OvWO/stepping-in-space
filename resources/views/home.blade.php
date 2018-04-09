@extends('layouts.app') @section('content')
<div class="wrapper">
  <div class="content">
        <!-- STARTS ABOUT -->
    <section id="about" class="dark">
      <h2>About <i class="fas fa-question-circle" style="color: #56ff50"></i></h2>
        <div class="clearfix">

      <div id="me"></div>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus atque cum labore provident, enim voluptate, ratione id molestiae quisquam et libero sed saepe maiores magnam qui blanditiis quo hic ullam dolore a ipsam quia odio. Aliquam eum magnam quo quis consectetur? Exercitationem ullam repudiandae quisquam earum temporibus fugiat veniam natus!</p>
  </div>
    </section>
        <!-- ENDS ABOUT -->
    <!-- STARTS PORTFOLIO -->
    <section id="portfolio" class="dark">
      <ul>
        <li>
          <div class="card">
            <img src="img/code1.jpeg" alt="project">
            <div class="card-content">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Neque sapiente nesciunt, molestiae necessitatibus ratione soluta, dolor dicta voluptas illum fugiat.
            </div>
          </div>
        </li>
        <li>
          <div class="card">
            <img src="img/code1.jpeg" alt="project">
            <div class="card-content">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Neque sapiente nesciunt, molestiae necessitatibus ratione soluta, dolor dicta voluptas illum fugiat.
            </div>
          </div>
        </li>
        <li>
          <div class="card">
            <img src="img/code1.jpeg" alt="project">
            <div class="card-content">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Neque sapiente nesciunt, molestiae necessitatibus ratione soluta, dolor dicta voluptas illum fugiat.
            </div>
          </div>
        </li>
      </ul>
    </section>
        <!-- ENDS PORTFOLIO -->
  </div>
</div>
@endsection
