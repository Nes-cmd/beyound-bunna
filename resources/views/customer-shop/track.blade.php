<x-customer-layout>

<!-- main wrapper -->
<div class="main-wrapper">

    <!-- breadcrumb -->
    <nav class="bg-gray py-3">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('shop.index')}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Order Track</li>
            </ol>
        </div>
    </nav>
    <!-- /breadcrumb -->

    <!-- track -->
    <section class="section">
        <div class="container">
            <div class="row bg-dark">
                <div class="col-lg-12 text-center">
                    <div class="p-4">
                        <h5 class="text-white">TRACKING ORDER NO - 3587SMRT37</h5>
                    </div>
                </div>
            </div>
            <div class="row bg-gray px-3 py-5">
                <div class="col-md-4 text-center">
                    <p><strong>Shipped Via: </strong>Standard Delevery</p>
                </div>
                <div class="col-md-4 text-center">
                    <p><strong>Status: </strong>Processing Order</p>
                </div>
                <div class="col-md-4 text-center">
                    <p><strong>Expected Date: </strong>Sep 1, 2019</p>
                </div>
                <div class="d-flex justify-content-between w-100 mt-5 flex-column flex-sm-row">
                    <div class="border mx-1 mb-2 border-primary p-2 p-md-4 text-center">
                        <i class="ti-bag icon-md mb-3 d-inline-block"></i>
                        <h5>Confirmed Order</h5>
                    </div>
                    <div class="border mx-1 mb-2 border-primary p-2 p-md-4 text-center">
                        <i class="ti-settings icon-md mb-3 d-inline-block"></i>
                        <h5>Processing Order</h5>
                    </div>
                    <div class="border mx-1 mb-2 p-2 p-md-4 text-center">
                        <i class="ti-crown icon-md mb-3 d-inline-block"></i>
                        <h5>Quality Check</h5>
                    </div>
                    <div class="border mx-1 mb-2 p-2 p-md-4 text-center">
                        <i class="ti-truck icon-md mb-3 d-inline-block"></i>
                        <h5>Product Dispatched</h5>
                    </div>
                    <div class="border mx-1 mb-2 p-2 p-md-4 text-center">
                        <i class="ti-home icon-md mb-3 d-inline-block"></i>
                        <h5>Product Delivered</h5>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /track -->
</x-customer-layout>