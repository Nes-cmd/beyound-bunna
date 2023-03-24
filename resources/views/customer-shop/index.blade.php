<x-customer-layout>
  <!-- main wrapper -->
  <div class="main-wrapper">
    @section('title') - Home @endsection

    <div class="hero-slider">
      @foreach($sliders as $slider)
      <div class="slider-item th-fullpage hero-area" style="background-image: url({{ asset('storage/'.$slider->path) }});">
        <div class="container">
          <div class="row">
            <div class="col-lg-8 text-left">
              <p data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".1">{{$slider->name}}</p>
              <h1 data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".5">{{$slider->offer}}<br>
                {{ $slider->description}}
              </h1>
              <a data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".8" class="btn" href="{{ route('shop.list')}}">Shop Now</a>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>

    <!-- /hero area -->

    <!-- categories -->
    @include('customer-shop.blocks.top-categories', ['categories' => $categories])
    <!-- /categories -->

    <!-- collection -->
    @include('customer-shop.blocks.top-collections')
    <!-- /collection -->

    <!-- deal -->
    @if ( $dealofday ) @include('customer-shop.blocks.dealof-day', ['dealofday' => $dealofday]) @endif
    <!-- /deal -->

    <!-- instagram -->
    <section class="section instagram-feed">
      <div class="container">
        <div class="row">
          <div class="title">
            <h2>View us on instagram</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="instagram-slider" id="instafeed" data-accessToken="IGQVJYeUk4YWNIY1h4OWZANeS1wRHZARdjJ5QmdueXN2RFR6NF9iYUtfcGp1NmpxZA3RTbnU1MXpDNVBHTzZAMOFlxcGlkVHBKdjhqSnUybERhNWdQSE5hVmtXT013MEhOQVJJRGJBRURn">
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /instagram -->

    <!-- newsletter -->
    <section class="section bg-gray">
      @livewire('subscriber')
    </section>
    <!-- /newsletter -->
    <!-- /Newsletter Modal -->
</x-customer-layout>