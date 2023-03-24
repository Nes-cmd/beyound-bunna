
<div class="row">
@section('title') - Shop grid  @endsection
    @foreach($products as $product)
    <!-- product -->
    <div class="col-lg-4 col-sm-6 mb-4">
        <div class="product text-center">
            <div class="product-thumb">
                <div class="overflow-hidden position-relative">
                    <a href="{{ route('shop.product-single', $product->id)}}">
                        <img height="400px" width="300px" class="img-fluid mb-3 img-first" src="{{ asset($product->photos[0])}}" alt="product-img">
                        @if($product->photos->has(1))
                        <img height="400px" width="300px" class="img-fluid mb-3 img-second" src="{{ asset($product->photos[1])}}" alt="product-img">
                        @endif
                    </a>
                    <div class="btn-cart">
                        <button wire:click="$emit('toCart' , {{$product->id}} )" class="btn btn-primary btn-sm">Add To Cart</button>
                    </div>
                </div>
                <div class="product-hover-overlay">
                    <a wire:click="wishlit({{$product->id}})" class="product-icon favorite" data-toggle="tooltip" data-placement="left" title="Wishlist"><i class="ti-heart"></i></a>
                    <a href="{{route('shop.product-single', $product->id)}}" class="product-icon cart" data-toggle="tooltip" data-placement="left" title="View detail"><i class="ti-search"></i></a>
                </div>
            </div>
            <div class="product-info">
                <h3 class="h5">{{ $product->name }}</h3>
                <span class="h5">${{$product->price}}</span>
            </div>
            <!-- product label badge -->
            @if($product->discount)
                <div class="product-label sale">
                -{{$product->discount}}
                </div>
            @endif
        </div>
    </div>
    <!-- //end of product -->
    <!-- product -->
    @endforeach
</div>