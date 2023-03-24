<section class="section bg-cover" data-background="customer/images/backgrounds/deal.jpg">
  <div class="container">
    <div class="row">
      <div class="col-md-6 text-center text-md-left mb-4 mb-md-0">
        <h1>{{ $dealofday->title }}</h1>
        <h4 class="mb-40">{{ $dealofday->offer }}</h4>
        <!-- syo-timer -->
        <div class="syotimer large">
          <div id="simple-timer" data-year="{{ $dealofday->count_down->year }}" data-month="{{ $dealofday->count_down->month }}" data-day="{{ $dealofday->count_down->day }}" data-hour="{{ $dealofday->count_down->hour }}" data-minute="{{ $dealofday->count_down->minute }}"></div>
        </div>
        <a href="{{ route('shop.product-single', $dealofday->product_id)}}" class="btn btn-primary">shop now</a>
      </div>
      <div class="col-md-6 text-center text-md-left align-self-center">
        <img style="height: 400px;width:600px;margin-left:auto;margin-right:auto;" src="{{ asset('storage/'.$dealofday->path) }}" alt="product-img" class="img-fluid up-down">
      </div>
    </div>
  </div>
</section>
