<!DOCTYPE html>
<html lang="en">

<head>

  <!-- Basic Page Needs
  ================================================== -->
  <meta charset="utf-8">


  <!-- Mobile Specific Metas
  ================================================== -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Construction Html5 Template">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
  <meta name="author" content="Themefisher">
  <meta name="generator" content="Themefisher Constra HTML Template v1.0">

  <!-- theme meta -->
  <meta name="theme-name" content="aviato" />

  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="{{ asset('aida/images/favicon.png')}}" />

  <!-- Themefisher Icon font -->
  <link rel="stylesheet" href="{{ asset('aida/plugins/themefisher-font/style.css')}}">
  <!-- bootstrap.min css -->
  <link rel="stylesheet" href="{{ asset('aida/plugins/bootstrap/css/bootstrap.min.css')}}">

  <!-- Animate css -->
  <link rel="stylesheet" href="{{ asset('aida/plugins/animate/animate.css')}}">
  <!-- Slick Carousel -->
  <link rel="stylesheet" href="{{ asset('aida/plugins/slick/slick.css')}}">
  <link rel="stylesheet" href="{{ asset('aida/plugins/slick/slick-theme.css')}}">

  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="{{ asset('aida/css/style.css')}}">
  <link rel="stylesheet" href="{{ asset('aida/css/custom.css')}}">
  <title>
    {{ config('app.name') }}
    @yield('title')
  </title>
  @livewireStyles

  <style>
    .reveal {
      position: relative;
      opacity: 0;
    }

    .reveal.active {
      opacity: 1;
    }

    .active.fade-bottom {
      animation: fade-bottom 1s ease-in;
    }

    .active.fade-left {
      animation: fade-left 1s ease-in;
    }

    .active.fade-right {
      animation: fade-right 1s ease-in;
    }

    @keyframes fade-bottom {
      0% {
        transform: translateY(200px);
        opacity: 0;
      }

      100% {
        transform: translateY(0);
        opacity: 1;
      }
    }

    @keyframes fade-left {
      0% {
        transform: translateX(-200px);
        opacity: 0;
      }

      100% {
        transform: translateX(0);
        opacity: 1;
      }
    }

    @keyframes fade-right {
      0% {
        transform: translateX(200px);
        opacity: 0;
      }

      100% {
        transform: translateX(0);
        opacity: 1;
      }
    }
  </style>
  <script>
    function reveal() {
      var reveals = document.querySelectorAll(".reveal");

      for (var i = 0; i < reveals.length; i++) {
        var windowHeight = window.innerHeight;
        var elementTop = reveals[i].getBoundingClientRect().top;
        var elementVisible = 150;

        if (elementTop < windowHeight - elementVisible) {
          reveals[i].classList.add("active");
        } else {
          reveals[i].classList.remove("active");
        }
      }
    }
    window.addEventListener("scroll", reveal);
  </script>

</head>

<body id="body">

  @include('layouts.customer.navbar')
  <!-- navigation -->
  @livewire('alert-component')

  {{ $slot }}

  @include('customer-shop.blocks.footer')
  @livewireScripts
  <script>
    Livewire.on('makeAlert', message => {
      var element = document.getElementById(message.type);
      var body = document.getElementById(message.type + "-body");
      body.innerHTML = message.message;
      element.className += " show";
      console.log(element)
      setTimeout(function() {
        element.className = element.className.replace(" show", "");
      }, 7000);
    });
  </script>

  <!-- Main jQuery -->
  <script src="{{ asset('aida/plugins/jquery/dist/jquery.min.js')}}"></script>
  <!-- Bootstrap 3.1 -->
  <script src="{{ asset('aida/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
  <!-- Bootstrap Touchpin -->
  <script src="{{ asset('aida/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js')}}"></script>
  <!-- Instagram Feed Js -->
  <script src="{{ asset('aida/plugins/instafeed/instafeed.min.js')}}"></script>
  <!-- Video Lightbox Plugin -->
  <script src="{{ asset('aida/plugins/ekko-lightbox/dist/ekko-lightbox.min.js')}}"></script>
  <!-- Count Down Js -->
  <script src="{{ asset('aida/plugins/syo-timer/build/jquery.syotimer.min.js')}}"></script>

  <!-- slick Carousel -->
  <script src="{{ asset('aida/plugins/slick/slick.min.js')}}"></script>
  <script src="{{ asset('aida/plugins/slick/slick-animation.min.js')}}"></script>

  <!-- Google Mapl -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCC72vZw-6tGqFyRhhg5CkF2fqfILn2Tsw"></script>
  <script type="text/javascript" src="{{ asset('aida/plugins/google-map/gmap.js')}}"></script>
  <!-- Main Js File -->
  <script src="{{ asset('aida/js/script.js')}}"></script>
</body>

</html>