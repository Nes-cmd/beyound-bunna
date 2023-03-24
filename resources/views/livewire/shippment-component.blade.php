<div>
    <style>
        .country-code-text {
            position: absolute;
            z-index: 2000;
            left: 25px;
            bottom: 14px;
            background-color: rgb(196, 196, 196);
            font-size:17px;
            padding-bottom: 5px;
            padding-top: 5px;
            padding-left: 2px;
            padding-right: 2px;
        }
        #phone-number {
            position: relative;
            /* border-left: 1px; */
            height: 50px;
            padding-left: 58px;
        }

    </style>
    <div class="row">
    @if(sizeof($savedAdress) > 0)
    <!-- select shipping adress -->
        <div class="col-12">
            <h3 class="mb-5 border-bottom pb-2">Select A Shipping Adress</h3>
        </div>
        @foreach ($savedAdress as $adr)
            <div class="col-sm-6 mb-4">
                <input wire:model="shippment.shippment_adress_id" id="{{$adr->id}}" class="custom-checkbox" type="radio" value="{{$adr->id}}" name="adress_id">
                <label for="{{$adr->id}}">{{ $adr->city->name }}</label>
                <small class="d-block ml-3">{{'Posta number: '. $adr->posta_number.', Zip Code: '.$adr->postal_code }}</small>
            </div>
        @endforeach
        @error('shippment.shippment_adress_id')
            <span for="zip-code" style="color:red;margin-left:20px;">{{$message}}</span> </br>
        @enderror
    @endif
        <div class="col-sm-6 mb-4 row ml-1">
           
            New adress :  
            <li class="list-inline-item mr-4">
              <label class="radio ml-2">
                <input wire:model="newAdress" type="checkbox" name="radio">
                <span class="radio-box bg-magenta"></span> 
              </label>
            </li>
           
        </div>
    </div>  
    
        <!-- /select shipping method -->
    @if($newAdress)
    <h3 class="mb-5 border-bottom pb-2">New Address</h3>
    <div class="row">
        <div class="col-sm-6">
            <label for="firstName">Full Name</label>
            <input class="form-control" wire:model.lazy="adress.fullname" value=""  style="margin-bottom:0px;" type="text" id="firstName" name="firstName" required>
            @error('adress.fullname')
                <span for="zip-code" style="color:red;">{{$message}}</span>
            @enderror
        </div>
    
        <div class="col-sm-6">
            <label for="country">Country</label>
            <select wire:model="adress.country_id" onchange="countrySelected()"  style="margin-bottom:0px;" class="form-control" id="countrySelect">
                <option value="">Country</option>
                @foreach ($countries as $country)
                    <option  value="{{ $country['id'] }}">{{ $country['name'] }}</option>
                @endforeach
            </select>
            @error('adress.country_id')
                <span for="zip-code" style="color:red;">{{$message}}</span>
            @enderror
        </div>
        <div class="col-sm-6">
            <label for="country">Province (State/Region)</label>
            <input wire:model.lazy="adress.province_name"  style="margin-bottom:0px;" class="form-control" name="province_name">
            @error('adress.province_name')
                <span for="zip-code" style="color:red;">{{$message}}</span>
            @enderror
        </div>
        <div class="col-sm-6">
            <label for="city">City</label>
            <select wire:model.lazy="adress.city_id" onchange="citySelected()" style="margin-bottom:0px;" class="form-control" id="citySelect">
                <option value="">Your city</option>
                @if($cities)
                    @foreach ($cities as $city)
                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                    @endforeach
                @endif
            </select>
            @error('adress.city')
                <span for="zip-code" style="color:red;">{{$message}}</span>
            @enderror
        </div>

        <div class="col-sm-6">
            <label for="lastName">Phone Number</label>
            <div class="input-group-prepend" >
                @if($country_code)
                    <span class="country-code-text" >{{ $country_code }}</span>
                @endif
                <input wire:model.lazy="adress.phone"  style="margin-bottom:0px;" id="phone-number" class="form-control" type="tel">
            </div>
            @error('adress.phone')
                    <span for="zip-code" style="color:red;">{{$message}}</span>
                @enderror
        </div>
        
        <div class="col-sm-6">
            <label for="email">Email</label>
            <input wire:model.lazy="adress.email"  style="margin-bottom:0px;" class="form-control" type="email" id="email" name="email" required>
            @error('adress.email')
                <span for="zip-code" style="color:red;">{{$message}}</span>
            @enderror
        </div>
        <div class="col-sm-6">
            <label for="company">Posta Number</label>
            <input wire:model.lazy="adress.posta_number"  style="margin-bottom:0px;" class="form-control" type="text" id="company" name="company" required>
            @error('adress.posta_number')
                <span for="zip-code" style="color:red;">{{$message}}</span>
            @enderror
        </div>
        <div class="col-sm-6">
            <label for="address">Address line 1</label>
            <input wire:model.lazy="adress.addressLine1"  style="margin-bottom:0px;" class="form-control" type="text" id="address"  required>
            @error('adress.addressLine1')
                <span for="zip-code" style="color:red;">{{$message}}</span>
            @enderror
        </div>
        <div class="col-sm-6">
            <label for="addressLine2">Address line 2</label>
            <input wire:model.lazy="adress.addressLine2"  style="margin-bottom:0px;" class="form-control" type="text" id="address"  required>
            @error('adress.addressLine2')
                <span for="zip-code" style="color:red;">{{$message}}</span>
            @enderror
        </div>
        <div class="col-sm-6">
            <label for="addressLine3">Address line 3</label>
            <input wire:model.lazy="adress.addressLine3"  style="margin-bottom:0px;" class="form-control" id="address type="text"  required>
            @error('adress.addressLine3') 
                <span for="zip-code" style="color:red;">{{$message}}</span>
            @enderror
        </div>
        <div class="col-sm-6">
            <label for="zip-code">Zip Code</label>
            <input wire:model.lazy="adress.postal_code" style="margin-bottom:0px;" class="form-control" type="text" id="zip-code" >
            @error('adress.postal_code')
                <span for="zip-code" style="color:red;">{{$message}}</span>
            @enderror
        </div>
    </div>
    @endif
    
    <div class="row">
        <!-- select shipping method -->
        @if($shippmentMethod != null)
        <div class="col-12">
            <h3 class="mb-5 border-bottom pb-2">Select A Shippment Method</h3>
        </div>
        @if($shippmentMethod == 'unavailable')
        <div div class="col-12">
            <h5 class="mb-5 border-bottom pb-2">Sorry! Shippment method is not available for your adress!</h5>
        </div>
        @else
            @foreach ($shippmentMethod  as $method => $shipp)
                <div class="col-sm-6 mb-4">
                    <input wire:model="shippment.shippment_method" id="{{$shipp['shippmentName'] }}" class="custom-checkbox" type="radio"  value="{{ $method }}" name="shippment_method">
                    <label for="{{$shipp['shippmentName']}}">  {{ $method .'-'. $shipp['shippmentName'] }}</label>
                        <span class="ml-3 d-block">{{'Estimated price : '.$shipp['price'].$shipp['currency']}}</span>
                        <small class="d-block ml-3">{{'Estimated delivery time : '. $shipp['estimatedTime']}}</small>
                </div>
            @endforeach
            @error('shippment.shippment_method')
                <span for="zip-code" style="color:red;margin-left:20px">{{$message}}</span>
            @enderror
        @endif
        @endif
    </div>
    
    
    <!-- /shipping-address -->
    <div class="p-4 bg-gray text-right mt-4">
        <div wire:loading >
            <button class="btn btn-primary buttonload"><i class="fa fa-spinner fa-spin"></i> Please wait</button>
        </div>
        <div wire:loading.remove >
            <button wire:click="continue"  class="btn btn-primary">Continue</button>
        </div>
    </div>
    

    
    <script>
        function countrySelected(){
            let select = document.getElementById('countrySelect');
            let id = select.options[select.selectedIndex].value;
            Livewire.emit('countrySelected', id)
        }
        function citySelected(){
            let select = document.getElementById('citySelect');
            let id = select.options[select.selectedIndex].value;
            Livewire.emit('citySelected', id)
        }
    </script>
</div>
