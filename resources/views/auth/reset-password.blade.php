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
  <link href="{{ asset('customer/css/style.css')}}" rel="stylesheet">

  <!--Favicon-->
  <link rel="shortcut icon" href="{{ asset('customer/images/favicon.png')}}" type="image/x-icon">
  <link rel="icon" href="{{ asset('customer/images/favicon.png')}}" type="image/x-icon">

</head>

<body>

  <!-- preloader start -->
  <div class="preloader">
    <img src="{{ asset('customer/images/preloader.gif')}}" alt="preloader">
  </div>
  <!-- preloader end -->

<section class="signin-page account">
  <div class="container">
    <div class="row">
      <div class="col-md-6 mx-auto">
        <div class="block text-center">
          <a class="logo" href="{{ route('shop.index')}}">
            <img height="35px" src="{{ asset('customer/images/main-logo.png')}}" alt="logo">
          </a>
          <h2 class="text-center">Welcome Back</h2>
          <form class="text-left clearfix" method="post" action="{{ url('reset-password')}}" >
            @csrf
            <input type="hidden" value="{{ request()->route('token') }}" name="token">
            <div class="form-group">
              <input type="email" class="form-control" name="email" value="{{ old('email')}}" placeholder="Email">
              @error('email')
                <span style="color:red;padding-left:3px">{{ $message }}</span>
              @enderror
            </div>
            <div class="form-group">
              <input type="password" name="password" class="form-control" placeholder="Password">
            </div>
            <div class="form-group">
              <input type="password" name="password_confirmation" class="form-control" placeholder="Password Confirmation">
              @error('password')
                <span style="color:red;padding-left:3px">{{ $message }}</span>
              @enderror
            </div>
            <div class="text-center">
              <button type="submit" class="btn btn-primary" >Reset password</button>
            </div>
          </form>
          <p class="mt-3">New in this site ?<a href="{{ route('register')}}"> Create New Account</a></p>
          <p><a href="{{ url('forgot-password') }}"> Forgot your password?</a></p>
        </div>
      </div>
    </div>
  </div>
</section>

</div>
<!-- /main wrapper -->

<!-- jQuery -->
<script src="{{ asset('customer/plugins/jQuery/jquery.min.js')}}"></script>
<!-- Bootstrap JS -->
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
<script src="plugins/google-map/gmap.js"></script>
<!-- Main Script -->
<script src="{{ asset('customer/js/script.js')}}"></script>
</body>

</html>