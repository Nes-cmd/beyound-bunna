<!-- Start Top Header Bar -->
<section class="top-header">
  <style>
    .logo-1 {
      width:135px; 
      height:80px; 
      object-fit:none;
      object-position: center;
    }
  </style>
  <div class="container">
    <div class="row">
      <div class="col-md-4 col-xs-12 col-sm-4">
        <div class="contact-number">
          <i class="tf-ion-ios-telephone"></i>
          <a href="tel: +251 94 474 7408">+251 94 474 7408</a>
        </div>
      </div>
      <div class="col-md-4 col-xs-12 col-sm-4">
        <!-- Site Logo -->
        <div class="logo text-center">
          <a href="{{ url('/') }}">
            <!-- replace logo here -->
            <img style="object-fit: contain;height:80%;"  class="logo-1" src="{{ asset('aida/logo2.svg') }}" alt="">
            <!-- <svg width="135px" height="29px" viewBox="0 0 155 29" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
              <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" font-size="40" font-family="AustinBold, Austin" font-weight="bold">
                <g id="Group" transform="translate(-108.000000, -297.000000)" fill="rgb(137, 21, 23)000">
                  <text id="AVIATO">
                    <tspan x="108.94" y="325">AIDA'S</tspan>
                  </text>
                </g>
              </g>
            </svg> -->
          </a>
        </div>
      </div>
      <div class="col-md-4 col-xs-12 col-sm-4">
        <!-- Cart -->
        <ul class="top-menu text-right list-inline">
          @livewire('cart')
          @livewire('search-component')
        </ul>
      </div>
    </div>
  </div>
</section>
<!-- End Top Header Bar -->
<section class="menu">
  <nav class="navbar navigation">
    <div class="container">
      <div class="navbar-header">
        <h2 class="menu-title">Main Menu</h2>
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>

      </div><!-- / .navbar-header -->

      <!-- Navbar Links -->
      <div id="navbar" class="navbar-collapse collapse text-center">
        <ul class="nav navbar-nav">

          <!-- Home -->
          <li class="dropdown ">
            <a href="{{ route('shop.index') }}">Home</a>
          </li><!-- / Home -->

          <!-- About -->
          <li class="dropdown ">
            <a href="{{ url('about')}}">About Us</a>
          </li><!-- / About -->

          <!-- Elements -->
          <li class="dropdown dropdown-slide">
            <a href="#!" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="350" role="button" aria-haspopup="true" aria-expanded="false">Shop <span class="tf-ion-ios-arrow-down"></span></a>
            <div class="dropdown-menu">
              <div class="row">
                <!-- Basic -->
                @foreach($menus as $menu)
                <div class="col-lg-6 col-md-6 mb-sm-3">
                  <ul>
                    <li class="dropdown-header"> <a href="{{ route('shop.list', $menu->id) }}"> {{ $menu->name }} </a></li>
                    <li role="separator" class="divider"></li>
                    @foreach($menu->subCategory as $sub)
                      <li><a href="{{ route('shop.shop-sub-list', [$menu->name,$sub->id])}}" >{{ $sub->name }}</a></li>
                    @endforeach
                  </ul>
                </div>
                @endforeach
              </div><!-- / .row -->
            </div>
          </li>

          <!-- Travel -->
          <li class="dropdown ">
            <a href="{{ route('travel') }}">Travel</a>
          </li><!-- / Travel -->
          <li class="dropdown ">
            <a href="{{ route('shop.contact')}}">Contact Us</a>
          </li>
          <!-- / Travel -->
          @auth 
          <li class="dropdown ">
            <a href="{{ route('customer.dashboard.index')}}">Account</a>
          </li>
          @endauth
          @guest 
          <li class="dropdown ">
            <a href="{{ route('login')}}">Login</a>
          </li>
          @endguest
        </ul>
        <!-- / .nav .navbar-nav -->

      </div>
      <!--/.navbar-collapse -->
    </div><!-- / .container -->
  </nav>
</section>