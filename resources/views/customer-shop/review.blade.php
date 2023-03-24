<x-customer-layout>
<!-- main wrapper -->
<div class="main-wrapper">

    <!-- breadcrumb -->
    <nav class="bg-gray py-3">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Shipping Information</li>
            </ol>
        </div>
    </nav>
    <!-- /breadcrumb -->

    <!-- ORDER-REVIEW -->
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="inner-wrapper border-box">
                        <!-- navbar -->
                        <div class="justify-content-between nav mb-5">
                            <a href="{{ route('shop.checkout')}}" class="text-center d-inline-block nav-item">
                                <i class="ti-truck d-block mb-2"></i>
                                <span class="d-block h4">Shipping Method</span>
                            </a>
                            <a href="{{ route('shop.payment')}}" class="text-center d-inline-block nav-item ">
                                <i class="ti-wallet d-block mb-2"></i>
                                <span class="d-block h4">Payment Method</span>
                            </a>
                            <a href="{{ route('shop.review')}}" class="text-center d-inline-block nav-item active">
                                <i class="ti-eye d-block mb-2"></i>
                                <span class="d-block h4">Review</span>
                            </a>
                        </div>
                        <!-- /navbar -->

                        <!-- review -->
                        <h3>Order Review</h3>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <td></td>
                                        <td>Product Name</td>
                                        <td>Quantity</td>
                                        <td>Sub Total</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="align-middle"><img class="img-fluid" src="customer/images/cart/product-1.jpg" alt="product-img" /></td>
                                        <td class="align-middle">Tops</td>
                                        <td class="align-middle">1</td>
                                        <td class="align-middle">$220.00</td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle"><img class="img-fluid" src="customer/images/cart/product-2.jpg" alt="product-img" /></td>
                                        <td class="align-middle">Jacket</td>
                                        <td class="align-middle">1</td>
                                        <td class="align-middle">$520.00</td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle"><img class="img-fluid" src="customer/images/cart/product-1.jpg" alt="product-img" /></td>
                                        <td class="align-middle">Tops</td>
                                        <td class="align-middle">1</td>
                                        <td class="align-middle">$220.00</td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle"><img class="img-fluid" src="customer/images/cart/product-2.jpg" alt="product-img" /></td>
                                        <td class="align-middle">Jacket</td>
                                        <td class="align-middle">1</td>
                                        <td class="align-middle">$520.00</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /review -->

                        <!-- shipping-information -->
                        <h3 class="mb-5 border-bottom pb-2">Shipping Information</h3>
                        <div class="row mb-5">
                            <div class="col-md-4">
                                <h4 class="mb-3">Shipping Address</h4>
                                <ul class="list-unstyled">
                                    <li>Somrat</li>
                                    <li>Mohammadpur, Dhaka 120, Bangladesh </li>
                                    <li>248-321-5879 </li>
                                    <li>example.site@email.com</li>
                                </ul>
                            </div>
                            <div class="col-md-4">
                                <h4 class="mb-3">Shipping Method</h4>
                                <ul class="list-unstyled">
                                    <li>Standard Ground (USPS) - $9.50 </li>
                                    <li>Delivered in 8-10 business days. </li>
                                </ul>
                            </div>
                            <div class="col-md-4">
                                <h4 class="mb-3">Payment Method</h4>
                                <ul class="list-unstyled">
                                    <li>Credit Card: </li>
                                    <li>**** **** **** 2637</li>
                                </ul>
                            </div>
                        </div>

                        <!-- buttons -->
                        <div class="p-4 bg-gray d-flex justify-content-between">
                            <a href="{{ route('shop.payment')}}" class="btn btn-dark">Back</a>
                            <a href="confirmation.html" class="btn btn-primary">Continue</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="border-box p-4">
                        <h4>Order Summery</h4>
                        <p>Excepteur sint occaecat cupidat non proi dent sunt.officia.</p>
                        <ul class="list-unstyled">
                            <li class="d-flex justify-content-between">
                                <span>Subtotal</span>
                                <span>$237.00</span>
                            </li>
                            <li class="d-flex justify-content-between">
                                <span>Shipping & Handling</span>
                                <span>$15.00</span>
                            </li>
                            <li class="d-flex justify-content-between">
                                <span>Estimated Tax</span>
                                <span>$0.00</span>
                            </li>
                        </ul>
                        <hr>
                        <div class="d-flex justify-content-between">
                            <span>Total</span>
                            <strong>USD $253.00</strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /ORDER-REVIEW -->
</x-customer-layout>