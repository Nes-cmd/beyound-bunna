<li class="dropdown cart-nav dropdown-slide">
    <a href="#!" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"><i class="tf-ion-android-cart"></i>Cart</a>

    <div class="dropdown-menu cart-dropdown">
        @if($cart_size)
        <!-- Cart Item -->
        @foreach($carts as $cart)
        <div class="media">
            <a class="pull-left" href="#!">
                <img class="media-object" src="{{ asset('storage/'.json_decode($cart['photos'])[0]) }}" alt="image" />
            </a>
            <div class="media-body">
                <h4 class="media-heading"><a href="#!">{{$cart['name']}}</a></h4>
                <div class="cart-price">
                    <span>{{ $cart['quantity'] }} x</span>
                    <span>${{$cart['price']}}</span>
                </div>
                <h5><strong>${{ $cart['quantity'] * $cart['price']}}</strong></h5>
            </div>
            <a wire:click="remove({{ $cart['id'] }})" href="#!" class="remove"><i class="tf-ion-close"></i></a>
        </div>
        @endforeach
        <!-- Cart Item -->
        <div class="cart-summary">
            <span>Total</span>
            <span class="total-price">${{cartTotal()['total']}}</span>
        </div>
        <ul class="text-center cart-buttons">
            <li><a href="{{ route('shop.cart')}}" class="btn btn-small">View Cart</a></li>
            <li><a href="{{ route('shop.checkout')}}" class="btn btn-small btn-solid-border">Checkout</a></li>
        </ul>
        @else
            <h4>Your cart is empty!</h4>
        @endif
    </div>
</li>