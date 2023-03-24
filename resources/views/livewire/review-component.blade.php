<div>
    @section('title') - Review  @endsection
    <h3>Order Review</h3>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <td>Image</td>
                    <td>Product Name</td>
                    <td>Quantity</td>
                    <td>Sub Total</td>
                </tr>
            </thead>
            <tbody>
                @foreach($carts as $cart)
                <tr>
                    <td class="align-middle"><img width="70px" class="img-fluid" src="{{ asset('storage/'.json_decode($cart['photos'])[0])}}" alt="product-img" /></td>
                    <td class="align-middle">{{$cart['name']}}</td>
                    <td class="align-middle">{{ $cart['quantity'] }}</td>
                    <td class="align-middle">{{ $cart['price'] * $cart['quantity'] }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /review -->

    <!-- shipping-information -->
    @if($shippmentAdress) 
    <h3 class="mb-5 border-bottom pb-2">Shipping Information</h3>
    <div class="row mb-5">
        <div class="col-md-4">
            <h4 class="mb-3">Shipping Address</h4>
            <ul class="list-unstyled">
                <li>{{$shippmentAdress['fullname'] }}</li>
                <li>{{$shippmentAdress['city_name']}}, {{$shippmentAdress['postal_code']}}</li>
                <li>{{$shippmentAdress['phone']}}</li>
                <li>{{$shippmentAdress['email']}}</li>
            </ul>
        </div>
        <div class="col-md-4">
            <h4 class="mb-3">Shipping Method</h4>
            <ul class="list-unstyled">
                <li>{{$shippmentAdress['shippmentMethod']['shippmentName']}} - {{$shippmentAdress['shippmentMethod']['price'].$shippmentAdress['shippmentMethod']['currency']}} </li>
                <li>Delivered in 8-10 business days. </li>
            </ul>
        </div>
        @if($paymentDetail)
        <div class="col-md-4">
            <h4 class="mb-3">Payment Method</h4>
            <ul class="list-unstyled">
                <li><h5>{{ $paymentDetail['method'] }}: </h5></li>
                @if($paymentDetail['method'] == 'cards')
                    <li>**** **** **** {{ substr($paymentDetail['data']['cardNumber'], strlen($paymentDetail['data']['cardNumber'])-4) }}</li>
                @endif
            </ul>
        </div>
        @endif
    </div>
    @endif

    <!-- buttons -->
    <div class="p-4 bg-gray d-flex justify-content-between mt-4">
        <div>
            <button wire:click="$emit('pageSelector', 'payment')" class="btn btn-dark">Back</button>
        </div>
        <div wire:loading style="cursor: none;">
            <button class="btn btn-primary"><i class="fa fa-spinner fa-spin"></i> Ordering...</button>
        </div>
        <div wire:loading.remove>
            <button wire:click="placeOrder" class="btn btn-primary">Place Order</button>
        </div>
        
    </div>
</div>