<div>
@section('title') - Shop list  @endsection
    @foreach($products as $product)
    <div class="product mb-4">
        <div class="row align-items-center">
            <div class="col-sm-4">
                <div class="product-thumb position-relative text-center">
                    <div class="overflow-hidden position-relative">
                        <a href="{{ route('shop.product-single', $product->id)}}">
                            <img class="img-fluid w-100 mb-3 img-first" src="{{ asset($product->photos[0])}}" alt="product-img">
                            @if(count($product->photos) > 0)
                            <img class="img-fluid w-100 mb-3 img-second" src="{{ asset($product->photos[1])}}" alt="product-img">
                            @endif
                        </a>
                    </div>
                    <div class="product-hover-overlay">
                        <button wire:click="wishlit({{$product->id}})" class="product-icon favorite" data-toggle="tooltip" data-placement="left" title="Wishlist"><i class="ti-heart"></i></button>
                        <a href="#" class="product-icon cart" data-toggle="tooltip" data-placement="left" title="Compare"><i class="ti-direction-alt"></i></a>
                        <a data-vbtype="inline" href="#quickView" class="product-icon view venobox" data-toggle="tooltip" data-placement="left" title="Quick View"><i class="ti-search"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="product-info">
                    <div class="product-info">
                        <h3 class="mb-md-4 mb-3"><a class="text-color" href="product-single.html">{{ $product->name }}</a></h3>
                        <p class="mb-md-4 mb-3">{{ $product->description }}</p>
                        <span class="h4">${{ $product->price }}</span>
                        <ul class="list-inline mt-3">
                            <li class="list-inline-item"><button wire:click="wishlit({{$product->id}})" class="btn btn-dark btn-sm">Add To
                                    Favorite</button></li>
                            <li class="list-inline-item"><button wire:click="$emit('toCart' , {{$product->id}} )" class="btn btn-primary btn-sm">Add To cart</button></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- product label badge -->
        @if($product->discount)
        <div class="product-label sale">
            -{{$product->discount}}
        </div>
        @endif
    </div>
    @endforeach
</div>