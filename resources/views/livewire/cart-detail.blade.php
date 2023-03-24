<div>
    @section('title') - Cart detail @endsection
    @include('customer-shop.blocks.breadcrumb', ['page' => 'Cart'])
    <div class="page-wrapper">
        <div class="cart shopping">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="block">
                            <div class="product-list">
                                <form method="post">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Item Name</th>
                                                <th>Quantity</th>
                                                <th>Item Price</th>
                                                <th>Sub Total</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($carts as $cart)
                                            <tr class="">
                                                <td class="">
                                                    <div class="product-info">
                                                        <img width="80" src="{{ asset('storage/'.json_decode($cart['photos'])[0]) }}" alt="" />
                                                        <a href="#!">{{$cart['name']}}</a>
                                                    </div>
                                                </td>
                                                <td class="">{{$cart['quantity']}}</td>

                                                <td class="">${{$cart['price']}}</td>
                                                <td class="">${{ $cart['quantity'] * $cart['price'] }}</td>
                                                <td class="">
                                                    <a wire:click="removeCart({{$cart['id']}})" role="button" class="product-remove" href="#!">Remove</a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <a href="{{ route('shop.checkout') }}" class="btn btn-main pull-right">Checkout</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>