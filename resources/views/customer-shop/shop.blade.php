<x-customer-layout>
<!-- main wrapper -->
<div class="main-wrapper">

    <!-- breadcrumb -->
    <nav class="bg-gray py-3">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Shop</li>
            </ol>
        </div>
    </nav>
    <!-- /breadcrumb -->

    <div id="quickView" class="quickview">
        <div class="row w-100">
            <div class="col-lg-6 col-md-6 mb-5 mb-md-0 pl-5 pt-4 pt-lg-0 pl-lg-0">
                <img src="images/feature/product.png" alt="product-img" class="img-fluid">
            </div>
            <div class="col-lg-5 col-md-6 text-center text-md-left align-self-center pl-5">
                <h3 class="mb-lg-2 mb-2">Woven Crop Cami</h3>
                <span class="mb-lg-4 mb-3 h5">$90.00</span>
                <p class="mb-lg-4 mb-3 text-gray">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. sed ut perspic atis unde omnis iste natus</p>
                <form action="#">
                    <select class="form-control w-100 mb-2" name="color">
          <option value="brown">Brown Color</option>
          <option value="gray">Gray Color</option>
          <option value="black">Black Color</option>
        </select>
                    <select class="form-control w-100 mb-3" name="size">
          <option value="small">Small Size</option>
          <option value="medium">Medium Size</option>
          <option value="large">Large Size</option>
        </select>
                    <button class="btn btn-primary w-100 mb-lg-4 mb-3">add to cart</button>
                </form>
                <ul class="list-inline social-icon-alt">
                    <li class="list-inline-item"><a href="#"><i class="ti-facebook"></i></a></li>
                    <li class="list-inline-item"><a href="#"><i class="ti-twitter-alt"></i></a></li>
                    <li class="list-inline-item"><a href="#"><i class="ti-vimeo-alt"></i></a></li>
                    <li class="list-inline-item"><a href="#"><i class="ti-google"></i></a></li>
                </ul>
            </div>
        </div>
    </div>

    <!-- shop -->
    <section class="section">
        <div class="container">
            <div class="row">
                <!-- top bar -->
                <div class="col-lg-12 mb-50">
                    <div class="d-flex border">
                        <div class="flex-basis-15 p-2 p-sm-4 border-right text-center">
                            <a class="text-color d-inline-block px-1" href="shop.html"><i class="ti-layout-grid3-alt"></i></a>
                            <a class="text-gray d-inline-block px-1" href="shop-list.html"><i class="ti-view-list-alt"></i></a>
                        </div>
                        <div class="flex-basis-55 p-2 p-sm-4 align-self-sm-center">
                            <p class="text-gray mb-0">Showing <span class="text-color">1-9 of 20</span> Results</p>
                        </div>
                        <div class="flex-basis-15 p-2 p-sm-4 border-right border-left text-center">
                            <select class="select" name="filter" id="filter">
                                <option value="1">Filter</option>
                                <option value="2">Popular</option>
                                <option value="3">Top Products</option>
                            </select>
                        </div>
                        <div class="flex-basis-15 p-2 p-sm-4 text-center">
                            <select class="select" name="short" id="short">
                                <option value="1">Short</option>
                                <option value="2">A-Z</option>
                                <option value="3">Z-A</option>
                            </select>
                        </div>
                    </div>
                </div>
                <!-- sidebar -->
                <div class="col-lg-3">
                    <!-- search product -->
                    <div class="position-relative mb-5">
                        <form action="#">
                            <input type="search" class="form-control rounded-0" id="search-product" placeholder="Search...">
                            <button type="submit" class="search-icon pr-3 r-0"><i class="ti-search text-color"></i></button>
                        </form>
                    </div>
                    <!-- categories -->
                    <div class="mb-30">
                        <h4 class="mb-3">Shop by Categories</h4>
                        <ul class="pl-0 shop-list list-unstyled">
                            <li>
                                <a href="#" class="d-flex py-2 text-gray justify-content-between">
                                    <span>Women’s Clothing</span><span>9</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="d-flex py-2 text-gray justify-content-between">
                                    <span>Man Fashion</span><span>5</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="d-flex py-2 text-gray justify-content-between">
                                    <span>Kid’s Clothing</span><span>3</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="d-flex py-2 text-gray justify-content-between">
                                    <span>Watches & Jewelry</span><span>2</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="d-flex py-2 text-gray justify-content-between">
                                    <span>Bags & Shoes</span><span>7</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="d-flex py-2 text-gray justify-content-between">
                                    <span>Toys & Kids</span><span>1</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="d-flex py-2 text-gray justify-content-between">
                                    <span>Electronics</span><span>8</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="d-flex py-2 text-gray justify-content-between">
                                    <span>Computers</span><span>11</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- price range -->
                    <div class="mb-30">
                        <h4 class="mb-4">Shop by Price</h4>
                        <input class="range-track" type="text" data-slider-min="0" data-slider-max="1000" data-slider-step="5" data-slider-value="[0,300]" />
                        <div class="d-flex justify-content-between">
                            <button class="btn btn-sm btn-primary">Filter</button>
                            <span class="value">$0 - $300</span>
                        </div>
                    </div>
                    <!-- size checkbox -->
                    <div class="mb-30">
                        <h4 class="mb-3">Shop by Size</h4>
                        <form action="#">
                            <div class="d-flex justify-content-between custom-checkbox">
                                <label class="label">L Large
                <input type="checkbox">
                <span class="box"></span>
              </label>
                                <span class="mt-2">9</span>
                            </div>
                            <div class="d-flex justify-content-between custom-checkbox">
                                <label class="label">XL Extra Large
                <input type="checkbox">
                <span class="box"></span>
              </label>
                                <span class="mt-2">5</span>
                            </div>
                            <div class="d-flex justify-content-between custom-checkbox">
                                <label class="label">M Medium
                <input type="checkbox">
                <span class="box"></span>
              </label>
                                <span class="mt-2">8</span>
                            </div>
                            <div class="d-flex justify-content-between custom-checkbox">
                                <label class="label">S Small
                <input type="checkbox">
                <span class="box"></span>
              </label>
                                <span class="mt-2">5</span>
                            </div>
                            <div class="d-flex justify-content-between custom-checkbox">
                                <label class="label">XS Extra Small
                <input type="checkbox">
                <span class="box"></span>
              </label>
                                <span class="mt-2">3</span>
                            </div>
                        </form>
                    </div>
                    <!-- color selector -->
                    <div class="color">
                        <h4 class="mb-3">Shop by Color</h4>
                        <ul class="list-inline">
                            <li class="list-inline-item mr-4">
                                <label class="radio">
                <input type="radio" name="radio">
                <span class="radio-box bg-magenta"></span>
              </label>
                            </li>
                            <li class="list-inline-item mr-4">
                                <label class="radio">
                <input type="radio" name="radio">
                <span class="radio-box bg-dark-green"></span>
              </label>
                            </li>
                            <li class="list-inline-item mr-4">
                                <label class="radio">
                <input type="radio" name="radio">
                <span class="radio-box bg-sky-blue"></span>
              </label>
                            </li>
                            <li class="list-inline-item mr-4">
                                <label class="radio">
                <input type="radio" name="radio">
                <span class="radio-box bg-red"></span>
              </label>
                            </li>
                            <li class="list-inline-item mr-4">
                                <label class="radio">
                <input type="radio" name="radio">
                <span class="radio-box bg-dark"></span>
              </label>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- product-list -->
                <div class="col-lg-9">
                    <div class="row">
                        <!-- product -->
                        @foreach($products as $product)
                        <div class="col-lg-4 col-sm-6 mb-4">
                            <div class="product text-center">
                                <div class="product-thumb">
                                    <div class="overflow-hidden position-relative">
                                        <a href="{{ route('shop.product-single', $product->id)}}">
                                            <img class="img-fluid w-100 mb-3 img-first" src="{{ asset($product->productPhotos[0]->path)}}" alt="product-img">
                                            <img class="img-fluid w-100 mb-3 img-second" src="{{ asset('customer/images/collection/product-4.jpg')}}" alt="product-img">
                                        </a>
                                        <div class="btn-cart">
                                            <a href="#" class="btn btn-primary btn-sm">Add To Cart</a>
                                        </div>
                                    </div>
                                    <div class="product-hover-overlay">
                                        <a href="#" class="product-icon favorite" data-toggle="tooltip" data-placement="left" title="Wishlist"><i class="ti-heart"></i></a>
                                        <a href="#" class="product-icon cart" data-toggle="tooltip" data-placement="left" title="Compare"><i class="ti-direction-alt"></i></a>
                                        <a data-vbtype="inline" href="#quickView" class="product-icon view venobox" data-toggle="tooltip" data-placement="left" title="Quick View"><i class="ti-search"></i></a>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <h3 class="h5"><a class="text-color" href="product-single.html">{{ $product->name }}</a></h3>
                                    <span class="h5">${{$product->price}}</span>
                                </div>
                                <!-- product label badge -->
                                <div class="product-label sale">
                                    -8%
                                </div>
                            </div>
                        </div>
                        <!-- //end of product -->
                        @endforeach

                        <div class="col-12 mt-5">
                            <nav>
                                <ul class="pagination justify-content-center">
                                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#"><i class="ti-arrow-right"></i></a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /shop -->
</x-customer-layout>