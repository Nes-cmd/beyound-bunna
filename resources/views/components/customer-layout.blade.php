<!DOCTYPE html>
<html lang="zxx">
<head>
  <meta charset="utf-8">
  <title>Shop Kager</title>

  <!-- mobile responsive meta -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

  <!-- ** Plugins Needed for the Project ** -->
  <!-- Bootstrap -->
  <link rel="stylesheet" href="{{ asset('customer/plugins/bootstrap/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{ asset('customer/plugins/themify-icons/themify-icons.css')}}">
  <link rel="stylesheet" href="{{ asset('customer/plugins/slick/slick.css')}}">
  <link rel="stylesheet" href="{{ asset('customer/plugins/venobox/venobox.css')}}">
  <link rel="stylesheet" href="{{ asset('customer/plugins/animate/animate.css')}}">
  <link rel="stylesheet" href="{{ asset('customer/plugins/aos/aos.css')}}">
  <link rel="stylesheet" href="{{ asset('customer/plugins/bootstrap-touchspin-master/jquery.bootstrap-touchspin.min.css')}}">
  <link rel="stylesheet" href="{{ asset('customer/plugins/nice-select/nice-select.css')}}">
  <link rel="stylesheet" href="{{ asset('customer/plugins/bootstrap-slider/bootstrap-slider.min.css')}}">

  <!-- Main Stylesheet -->
  <link href="{{ URL::to('customer/css/style.css')}}" rel="stylesheet">

  <!--Favicon-->
  <link rel="shortcut icon" href="{{ asset('customer/images/favicon.png')}}" type="image/x-icon">
  <link rel="icon" href="{{ asset('customer/images/favicon.png')}}" type="image/x-icon">
  @livewireStyles
  <style>
        .input-icons i {
            position: absolute;
        }
        .input-icons {
            width: 100%;
            margin-bottom: 15px;
        }
        .icon {
            padding: 10px;
            min-width: 40px;
        }
        .input-field {
            width: 100%;
            padding: 10px;
        }
    </style>
</head>

<body>

  <!-- preloader start -->
  <div class="preloader">
    <img src="{{ asset('customer/images/preloader.gif')}}" alt="preloader">
  </div>
  <!-- preloader end -->

<!-- header -->
<header>
  <!-- top advertise -->
  <!-- <div class="alert alert-secondary alert-dismissible fade show rounded-0 pb-0 mb-0" role="alert">
    <div class="d-flex justify-content-between">
      <p>SAVE UP TO $50</p>
      <h4>SALE!</h4>
      <div class="shop-now">
        <a href="shop.html" class="btn btn-sm btn-primary">Shop Now</a>
      </div>
    </div>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div> -->

  <!-- top header -->
  <div class="top-header">
    <div class="row">
      <div class="col-lg-6 text-center text-lg-left">
        <p class="text-white mb-lg-0 mb-1">Free Shipping On All Addis Ababa Orders • Express delivery</p>
      </div>
      <div class="col-lg-6 text-center text-lg-right">
        <ul class="list-inline">
          <li class="list-inline-item"><img src="customer/images/flag.jpg" alt="flag"></li>
          <li class="list-inline-item"><a href="{{ route('login')}}">My Accounts</a></li>
          <li class="list-inline-item">
            <form action="#">
              <select class="country" name="country">
                <option value="USD">USD</option>
                <option value="JPN">JPN</option>
                <option value="BAN">BAN</option>
              </select>
            </form>
          <li class="list-inline-item">
            <a class="active" href="#">EN</a>
            <a href="#">FR</a>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <!-- /top-header -->
</header>

<!-- navigation -->
@include('layouts.customer.navbar')
<!-- navigation -->
{{ $slot }}

<!-- footer -->
<footer class="bg-light">
  <div class="section">
    <div class="container">
      <div class="row">
        <div class="col-md-3 col-sm-6 mb-5 mb-md-0 text-center text-sm-left">
          <h4 class="mb-4">Contact</h4>
          <p>20464 Hirthe Curve Suite, Emardton, CT 12471-4107</p>
          <p>+5(305) 785-0437</p>
          <p>info@example.com</p>
          <ul class="list-inline social-icons">
            <li class="list-inline-item"><a href="#"><i class="ti-facebook"></i></a></li>
            <li class="list-inline-item"><a href="#"><i class="ti-twitter-alt"></i></a></li>
            <li class="list-inline-item"><a href="#"><i class="ti-vimeo-alt"></i></a></li>
            <li class="list-inline-item"><a href="#"><i class="ti-google"></i></a></li>
          </ul>
        </div>
        <div class="col-md-3 col-sm-6 mb-5 mb-md-0 text-center text-sm-left">
          <h4 class="mb-4">Category</h4>
          <ul class="pl-0 list-unstyled">
            <li class="mb-2"><a class="text-color" href="shop.html">Men</a></li>
            <li class="mb-2"><a class="text-color" href="shop.html">Women</a></li>
            <li class="mb-2"><a class="text-color" href="shop.html">Kids</a></li>
            <li class="mb-2"><a class="text-color" href="shop.html">Accessories</a></li>
            <li class="mb-2"><a class="text-color" href="shop.html">Shoe</a></li>
          </ul>
        </div>
        <div class="col-md-3 col-sm-6 mb-5 mb-md-0 text-center text-sm-left">
          <h4 class="mb-4">Useful Link</h4>
          <ul class="pl-0 list-unstyled">
            <li class="mb-2"><a class="text-color" href="about.html">News & Tips</a></li>
            <li class="mb-2"><a class="text-color" href="about.html">About Us</a></li>
            <li class="mb-2"><a class="text-color" href="address.html">Support</a></li>
            <li class="mb-2"><a class="text-color" href="shop.html">Our Shop</a></li>
            <li class="mb-2"><a class="text-color" href="contact.html">Contact Us</a></li>
          </ul>
        </div>
        <div class="col-md-3 col-sm-6 text-center text-sm-left">
          <h4 class="mb-4">Our Policies</h4>
          <ul class="pl-0 list-unstyled">
            <li class="mb-2"><a class="text-color" href="404.html">Privacy Policy</a></li>
            <li class="mb-2"><a class="text-color" href="404.html">Terms & Conditions</a></li>
            <li class="mb-2"><a class="text-color" href="404.html">Cookie Policy</a></li>
            <li class="mb-2"><a class="text-color" href="404.html">Terms of Sale</a></li>
            <li class="mb-2"><a class="text-color" href="dashboard.html">Free Shipping & Returns</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="bg-dark py-4">
    <div class="container">
      <div class="row">
        <div class="col-md-5 text-center text-md-left mb-4 mb-md-0 align-self-center">
          <p class="text-white mb-0">Logo &copy; 2018 all right reserved</p>
        </div>
        <div class="col-md-2 text-center text-md-left mb-4 mb-md-0">
          <img src="{{ asset('customer/images/logo-alt.png')}}" alt="logo">
        </div>
        <div class="col-md-5 text-center text-md-right mb-4 mb-md-0">
          <ul class="list-inline">
            <li class="list-inline-item"><img class="img-fluid rounded atm-card-img" src="{{ asset('customer/images/payment-card/card-1.jpg')}}" alt="card"></li>
            <li class="list-inline-item"><img class="img-fluid rounded atm-card-img" src="{{ asset('customer/images/payment-card/card-3.jpg')}}" alt="card"></li>
            <li class="list-inline-item"><img class="img-fluid rounded atm-card-img" src="{{ asset('customer/images/payment-card/card-2.jpg')}}" alt="card"></li>
            <li class="list-inline-item"><img class="img-fluid rounded atm-card-img" src="{{ asset('customer/images/payment-card/card-4.jpg')}}" alt="card"></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</footer>
<!-- /footer -->

</div>
<!-- /main wrapper -->
@livewireScripts
<!-- jQuery -->
<script src="{{ asset('customer/plugins/jQuery/jquery.min.js')}}"></script>
<!-- Bootstracustomer/p JS -->
<script src="{{ asset('customer/plugins/bootstrap/bootstrap.min.js')}}"></script>
<script src="{{ asset('customer/plugins/slick/slick.min.js')}}"></script>
<script src="{{ asset('customer/plugins/venobox/venobox.min.js')}}"></script>
<script src="{{ asset('customer/plugins/aos/aos.js')}}"></script>
<script src="{{ asset('customer/plugins/syotimer/jquery.syotimer.js')}}"></script>
<script src="{{ asset('customer/plugins/instafeed/instafeed.min.js')}}"></script>
<script src="{{ asset('customer/plugins/zoom-master/jquery.zoom.min.js')}}"></script>
<script src="{{ asset('customer/plugins/bootstrap-touchspin-master/jquery.bootstrap-touchspin.min.js')}}"></script>
<script src="{{ asset('customer/plugins/nice-select/jquery.nice-select.min.js')}}"></script>
<script src="{{ asset('customer/plugins/bootstrap-slider/bootstrap-slider.min.js')}}"></script>
<!-- google map -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU&amp;libraries=places"></script>
<script src="{{ asset('customer/plugins/google-map/gmap.js')}}"></script>
<!-- Main Script -->
<script src="{{ asset('customer/js/script.js')}}"></script>
</body>

</html>