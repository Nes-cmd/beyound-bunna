<div>
    @section('title') - Shippment Adress @endsection
    <!-- breadcrumb -->
    @include('customer-shop.blocks.breadcrumb', ['page' => 'Shipping information'])
    <!-- /breadcrumb -->

    <div class="page-wrapper">
        <div class="checkout shopping">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="block billing-details">
                            <h4 class="widget-title">Shipping Details</h4>
                            <form class="checkout-form">
                                <div class="form-group">
                                    <label for="full_name">Full Name</label>
                                    <input wire:model.lazy="adress.fullname" type="text" class="form-control" id="full_name" placeholder="">
                                    @error('adress.fullname')
                                    <span style="color:red;">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="checkout-country-code clearfix">
                                    <div class="form-group">
                                        <label for="phone">Phone</label>
                                        <input wire:model="adress.phone" type="text" class="form-control" id="phone" name="phone" value="">
                                        @error('adress.phone')
                                        <span style="color:red;">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="user_city">Email</label>
                                        <input wire:model="adress.email" type="text" class="form-control" id="user_city" name="city" value="">
                                        @error('adress.email')
                                        <span style="color:red;">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="user_country" style="position:absolute;top:35%;">Country</label>
                                    <select wire:model="adress.country_id" id="countrySelect" onchange="countrySelected()" style="padding-left: 95px; height:50px;" type="text" class="form-control" id="user_country" placeholder="">
                                        <option value=""></option>
                                        @foreach ($countries as $country)
                                        <option value="{{ $country['id'] }}">{{ $country['name'] }}</option>
                                        @endforeach
                                    </select>
                                    @error('adress.country_id')
                                    <span for="zip-code" style="color:red;">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="checkout-country-code clearfix">
                                    <div class="form-group">
                                        <label for="user_city" style="position:absolute;top:35%;">City</label>
                                        <select wire:model.lazy="adress.city_id" onchange="citySelected()" id="citySelect" style="padding-left: 95px; height:50px;" class="form-control" id="user_city" name="city" value="">
                                            <option value=""></option>
                                            @if($cities)
                                            @foreach ($cities as $city)
                                            <option value="{{ $city->id }}">{{ $city->name }}</option>
                                            @endforeach
                                            @endif
                                        </select>
                                        @error('adress.city_id')
                                        <span for="zip-code" style="color:red;">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="user_post_code">Zip Code</label>
                                        <input wire:model="adress.postal_code" type="text" class="form-control" id="user_post_code" name="zipcode" value="">
                                        @error('adress.postal_code')
                                        <span style="color:red;">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="addressLine1">Adress</label>
                                    <input wire:model="adress.addressLine1" type="text" class="form-control" id="addressLine1" name="zipcode" value="">
                                    @error('adress.addressLine1')
                                    <span style="color:red;">{{$message}}</span>
                                    @enderror
                                </div>
                            </form>
                        </div>

                        <div style="display:flex">
                            @if($shippmentMethod != null)
                            <div class="d-block billing-details">
                                <h4 class="widget-title">Shipping Details</h4>
                                @if($shippmentMethod == 'unavailable')
                                <h4>Sorry! Shippment method is not available for your adress!</h4>
                                @else
                                <div class="col-md-12">
                                    @foreach ($shippmentMethod as $method => $shipp)
                                    <div class="col-md-6 mb-4">
                                        <input wire:model="shippment.shippment_method" id="{{$shipp['shippmentName'] }}" type="radio" value="{{ $method }}" name="shippment_method">
                                        <label for="{{$shipp['shippmentName']}}" style="margin: 0 15px;">{{ $shipp['shippmentName'] }}</label>
                                        <br />
                                        <span class="ml-3 d-block">{{'Estimated price : '.$shipp['price'].$shipp['currency']}}</span>
                                        <br />
                                        <small class="d-block ml-3">{{'Estimated delivery time : '. $shipp['estimatedTime']}}</small>
                                    </div>
                                    @endforeach
                                    @error('shippment.shippment_method')
                                    <span for="zip-code" style="color:red;margin-left:20px">{{$message}}</span>
                                    @enderror
                                </div>
                                @endif
                            </div>
                            @endif
                        </div>


                        <div class="" style="display:block">
                            <div style="display:flex;">
                                <h4 class="widget-title">Payment Method</h4>
                                <div style="margin: 10px 15px; display:flex;">

                                    @if($paymentMethods['cards'])
                                    <div style="padding: 0 10px;">
                                        <input wire:model="payment.method" id="checkbox1" type="radio" name="checkbox" value="cards">
                                        <label for="checkbox1">Card</label>
                                    </div>
                                    @endif
                                    @if($paymentMethods['paypal'])
                                    <div>
                                        <input wire:model="payment.method" id="checkbox2" type="radio" name="checkbox" value="paypal">
                                        <label for="checkbox2">Paypal</label>
                                    </div>
                                    @endif
                                    @if($paymentMethods['cash-on-delivery'])
                                    <div>
                                        <input wire:model="payment.method" id="checkbox3" type="radio" name="checkbox" value="cash-on-delivery">
                                        <label for="checkbox3">Cash on delivery</label>
                                    </div>
                                    @endif
                                    @error('payment.method')
                                    <br /><span style="color:red;">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            @if(isset($payment['method']) && $payment['method'] == 'cards')
                            <p>Credit Cart Details (Secure payment)</p>
                            <div class="checkout-product-details">
                                <div class="payment">
                                    <div class="card-details">
                                        <div class="checkout-form">

                                            <div class="form-group">
                                                <label name="nameonCard" required for="card-name">Name on Card <span class="required">*</span></label>
                                                <input wire:model.lazy="payment.data.nameonCard" id="card-name" class="form-control" type="text">
                                                @error('payment.data.nameonCard')
                                                <span style="color:red;">{{$message}}</span>
                                                @enderror
                                            </div>
                                            <div class="checkout-country-code clearfix">
                                                <div class="form-group">
                                                    <label name="cardNumber" required for="card-number">Card Number <span class="required">*</span></label>
                                                    <input wire:model.lazy="payment.data.cardNumber" id="card-number" class="form-control" type="tel" placeholder="•••• •••• •••• ••••">
                                                    @error('payment.data.cardNumber')
                                                    <span for="zip-code" style="color:red;">{{$message}}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group half-width padding-left">
                                                    <label for="card-cvc">Card Code <span class="required">*</span></label>
                                                    <input wire:model.lazy="payment.data.cvv" id="card-cvc" class="form-control" type="text" maxlength="4" placeholder="CVC">
                                                    @error('payment.data.cvv')
                                                    <span style="color:red;">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="checkout-country-code clearfix">
                                                <div class="form-group half-width padding-left">
                                                    <label style="position:absolute;top:35%;" for="card-cvc">Expiry Year<span class="required">*</span></label>
                                                    <select wire:model.lazy="payment.data.expYear" id="card-cvc" class="form-control" style="padding-left: 95px; height:50px;" maxlength="4">
                                                        <option value=""></option>
                                                        <option value="2023">2023</option>
                                                        <option value="2024">2024</option>
                                                        <option value="2025">2025</option>
                                                        <option value="2026">2026</option>
                                                        <option value="2027">2027</option>
                                                        <option value="2028">2028</option>
                                                        <option value="2029">2029</option>
                                                        <option value="2030">2030</option>
                                                    </select>
                                                    @error('payment.data.expYear')
                                                    <span style="color:red;">{{$message}}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group half-width padding-left">
                                                    <label style="position:absolute;top:35%;" for="expMonth">Expiry Month<span class="required">*</span></label>
                                                    <select wire:model.lazy="payment.data.expMonth" pattern="\d{1,2}/\d{1,2}" id="expMonth" class="form-control" style="padding-left: 95px; height:50px;" maxlength="4">
                                                        <option value=""></option>
                                                        <option value="1">January</option>
                                                        <option value="2">February</option>
                                                        <option value="3">March</option>
                                                        <option value="4">April</option>
                                                        <option value="5">May</option>
                                                        <option value="6">June</option>
                                                        <option value="8">August</option>
                                                        <option value="9">September</option>
                                                        <option value="10">Octoberly</option>
                                                        <option value="11">November</option>
                                                        <option value="12">December</option>
                                                    </select>
                                                    @error('payment.data.expMonth')
                                                    <span style="color:red;">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                            <button wire:loading style="cursor: none;" class="btn btn-main mt-20"><i class="fa fa-spinner fa-spin"></i>Please wait...</button>
                            <button wire:loading.remove wire:click="placeOrder" class="btn btn-main mt-20">Place Order</button>
                        </div>




                    </div>
                    <div class="col-md-4">
                        <div class="product-checkout-details">
                            <div class="block">
                                <h4 class="widget-title">Order Summary</h4>
                                @foreach($carts as $cart)
                                <div class="media product-card">
                                    <a class="pull-left" href="product-single.html">
                                        <img class="media-object" src="{{ asset('storage/'.json_decode($cart['photos'])[0])}}" alt="Image" />
                                    </a>
                                    <div class="media-body">
                                        <h4 class="media-heading"><a href="product-single.html">{{$cart['name']}}</a></h4>
                                        <p class="price">{{ $cart['quantity'] .' x '. $cart['price'] }}</p>
                                        <span class="remove">Remove</span>
                                    </div>
                                </div>
                                @endforeach

                                <div class="discount-code">
                                    <p>Have a discount ? <a data-toggle="modal" data-target="#coupon-modal" href="#!">enter it here</a></p>
                                </div>
                                <ul class="summary-prices">
                                    <li>
                                        <span>Subtotal:</span>
                                        <span class="price">${{ cartTotal()['discounted'] }}</span>
                                    </li>
                                    <li>
                                        <span>Shipping:</span>
                                        <span>{{ $shippmentAdress?'$'.$shippmentAdress['shippmentMethod']['price']:'unknown' }}</span>
                                    </li>
                                </ul>
                                <div class="summary-total">
                                    <span>Total</span>
                                    <span>USD ${{$shippmentAdress?$shippmentAdress['shippmentMethod']['price'] + cartTotal()['discounted']:cartTotal()['discounted']}}</span>
                                </div>
                                <div class="verified-icon">
                                    <img src="{{ asset('aida/images/shop/verified.png')}}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function countrySelected() {
            let select = document.getElementById('countrySelect');
            let id = select.options[select.selectedIndex].value;
            Livewire.emit('countrySelected', id)
        }

        function citySelected() {
            let select = document.getElementById('citySelect');
            let id = select.options[select.selectedIndex].value;
            Livewire.emit('citySelected', id)
        }
    </script>
</div>