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
  <link rel="shortcut icon" href="customer/images/favicon.png" type="image/x-icon">
  <link rel="icon" href="customer/images/favicon.png" type="image/x-icon">

</head>

<body>

  <!-- preloader start -->
  <div class="preloader">
    <img src="customer/images/preloader.gif" alt="preloader">
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
          <h2 class="text-center">Create Your Account</h2>
          <form class="text-left clearfix" method="post" action="{{ route('register')}}">
            @csrf
            <div class="form-group">
              <input type="text" name="first-name" value="{{ old('first-name')}}" class="form-control"  placeholder="First Name">
            </div>
            @error('first-name')
              <span style="color:red;padding-left:3px">{{ $message }}</span>
            @enderror
            <div class="form-group">
              <input type="text" name="last-name" value="{{ old('last-name')}}" class="form-control"  placeholder="Last Name">
            </div>
            @error('last-name')
              <span style="color:red;padding-left:3px">{{ $message }}</span>
            @enderror
            <div class="form-group">
              <input type="email" name="email" value="{{ old('email')}}" class="form-control"  placeholder="Email">
            </div>
            @error('email')
              <span style="color:red;padding-left:3px">{{ $message }}</span>
            @enderror
            <div class="form-group">
              <input type="tel" name="phone" value="{{ old('phone')}}" class="form-control" style="border-radius:0"  placeholder="Phone eg">
            </div>
            @error('phone')
              <span style="color:red;padding-left:3px">{{ $message }}</span>
            @enderror
            <div class="form-group">
              <input type="password" name="password" class="form-control"  placeholder="Password">
            </div>
            @error('password')
              <span style="color:red;padding-left:3px">{{ $message }}</span>
            @enderror
            <div class="form-group">
              <input type="password" name="password-confirmation" class="form-control"  placeholder="Password">
            </div>
            <div class="text-center">
              <button type="submit" class="btn btn-primary">Register</button>
            </div>
          </form>
          <p class="mt-3">Already hava an account ?<a href="{{ route('login')}}"> Login</a></p>
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