<div>
    @section('title') - Payment  @endsection
    @if($shippmentAdress)
    <!-- shipping-information -->
    <h3 class="mb-5 border-bottom pb-2">Shipping Information</h3>
    <div class="row mb-5">
        <div class="col-md-6">
            <h4 class="mb-3b">Shipping Address</h4>
            <ul class="list-unstyled">
                <li>{{$shippmentAdress['fullname'] }}</li>
                <li>{{$shippmentAdress['city_name']}}, {{$shippmentAdress['postal_code']}}</li>
                <li>{{$shippmentAdress['phone']}}</li>
                <li>{{$shippmentAdress['email']}}</li>
            </ul>
        </div>
        <div class="col-md-6">
            <h4 class="mb-3">Shipping Method</h4>
            <ul class="list-unstyled">
                <li>{{$shippmentAdress['shippmentMethod']['shippmentName']}} - {{$shippmentAdress['shippmentMethod']['price'].$shippmentAdress['shippmentMethod']['currency']}} </li>
                <li>Delivered in 8-10 business days. </li>
            </ul>
        </div>
    </div>
    @endif
    <!-- billing information -->
    <h3 class="mb-5 border-bottom pb-2">Billing Information</h3>

    <div class="mb-4">
        <input wire:model="payment.method" id="checkbox1" type="radio" name="checkbox" value="paypal">
        <label for="checkbox1" class="h4">Pay with Paypal</label>
    </div>
    <div class="mb-4" >
        <input wire:model="payment.method" style="margin-bottom:0px;" id="checkbox2" type="radio" name="checkbox" value="cards">
        <label for="checkbox2" class="h4">Credit/Debit Card</label>
    </div>
    @error('payment.method')
        <span for="zip-code" style="color:red;">{{$message}}</span>
    @enderror
    @if(isset($payment['method']) && $payment['method'] == 'cards')
    <div class="mb-4">
        <small class="mb-2 d-block ml-3">We accept following credit card</small>
        <div class="form-group ml-3 row">
            <div class="col-12">
                <ul class="list-inline mb-3">
                    <li class="list-inline-item"><img src="{{ asset('customer/images/payment-card/card-1.jpg')}}" alt="card"></li>
                    <li class="list-inline-item"><img src="{{ asset('customer/images/payment-card/card-2.jpg')}}" alt="card"></li>
                    <li class="list-inline-item"><img src="{{ asset('customer/images/payment-card/card-3.jpg')}}" alt="card"></li>
                    <li class="list-inline-item"><img src="{{ asset('customer/images/payment-card/card-4.jpg')}}" alt="card"></li>
                </ul>
            </div>
            <div class="col-sm-6">
                <label for="cardName">Name on Card</label>
                <input wire:model.lazy="payment.data.nameonCard" style="margin-bottom:0px;" type="text" name="cardName" id="cardName" class="form-control">
                @error('payment.data.nameonCard')
                    <span for="zip-code" style="color:red;">{{$message}}</span>
                @enderror
            </div>
            <div class="col-sm-6">
                <label for="cardNumber">Card Number</label>
                <input wire:model.lazy="payment.data.cardNumber" style="margin-bottom:0px;" type="text" name="cardNumber" id="cardNumber" class="form-control">
                @error('payment.data.cardNumber')
                    <span for="zip-code" style="color:red;">{{$message}}</span>
                @enderror
            </div>
            <div class="col-sm-6">
                <div class="row">
                    <div class="col-12">
                        <label for="exDate">Expiration Date</label>
                    </div>
                    <div class="col-md-6">
                        <select wire:model.lazy="payment.data.expYear" style="margin-bottom:0px;" class="form-control" name="exDate">
                            <option value="">Year</option>
                            <option value="2022">2022</option>
                            <option value="2023">2023</option>
                            <option value="2024">2024</option>
                            <option value="2025">2025</option>
                            <option value="2026">2026</option>
                            <option value="2027">2027</option>
                            <option value="2028">2028</option>
                        </select>
                        @error('payment.data.expYear')
                            <span for="zip-code" style="color:red;">{{$message}}</span>
                        @enderror
                    </div>
                    <div wire:model.lazy="payment.data.expMonth" style="margin-bottom:0px;" class="col-md-6">
                        <select class="form-control" name="exDate">
                            <option value="">Month</option>
                            <option value="01">Jan</option>
                            <option value="02">Feb</option>
                            <option value="03">Mar</option>
                            <option value="04">Apr</option>
                            <option value="05">May</option>
                            <option value="06">Jun</option>
                            <option value="07">Jul</option>
                            <option value="08">Aug</option>
                            <option value="09">Sep</option>
                            <option value="10">Oct</option>
                            <option value="11">Nov</option>
                            <option value="12">Dec</option>
                        </select>
                        @error('payment.data.expMonth')
                            <span for="zip-code" style="color:red;">{{$message}}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <label for="cvc">CVC/CVV</label>
                <input wire:model.lazy="payment.data.cvv" style="margin-bottom:0px;" type="text" name="cvc" id="cvc" class="form-control" placeholder="1234">
                @error('payment.data.cvv')
                    <span for="zip-code" style="color:red;">{{$message}}</span>
                @enderror
            </div>
        </div>
    </div>
    @endif
    
    <!-- buttons -->
    <div class="p-4 bg-gray d-flex justify-content-between mt-4">
        <div>
            <button wire:click="$emit('pageSelector', 'shippment')" class="btn btn-dark">Back</button>
        </div>
        <div wire:loading>
            <button class="btn btn-primary"><i class="fa fa-spinner fa-spin"></i> Please wait</a>
        </div>
        <div wire:loading.remove>
            <button wire:click="continue" class="btn btn-primary">Continue</a>
        </div>
        
    </div>
</div>