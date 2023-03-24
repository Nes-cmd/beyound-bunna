<x-customer-layout>
    <section class="page-wrapper success-msg">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="block text-center">
                        <i class="tf-ion-android-checkmark-circle"></i>
                        <h2 class="text-center">We have received your order successfully</h2>
                        <p>Your order has been placed and will be processed as soon as possible. Make sure you make note of your order number, which is <span class="text-primary">{{ $tracking }}</span> You will be receiving an email shortly with confirmation of your order.</p>
                        <a href="{{ route('shop.list')}}" class="btn btn-main mt-20">Continue Shopping</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-customer-layout>