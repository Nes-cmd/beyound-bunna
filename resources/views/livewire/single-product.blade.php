<div>
    <section class="single-product">
        <div class="container">
            <div class="row">
                @section('title') - Product details @endsection
                <!-- breadcrumb -->
                @include('customer-shop.blocks.breadcrumb', ['page' => 'Single Product'])
                <div class="col-md-6">
                    <ol class="product-pagination text-right">
                        <li><a href="blog-left-sidebar.html"><i class="tf-ion-ios-arrow-left"></i> Next </a></li>
                        <li><a href="blog-left-sidebar.html">Preview <i class="tf-ion-ios-arrow-right"></i></a></li>
                    </ol>
                </div>
            </div>
            <div class="row mt-20">
                <div class="col-md-5">
                    <div class="single-product-slider">
                        <div id='carousel-custom' class='carousel slide' data-ride='carousel'>
                            <div class='carousel-outer'>
                                <!-- me art lab slider -->
                                <div class='carousel-inner '>
                                    @foreach($product->photos as $photo)
                                    <div class="item {{ $loop->index == 0?'active':'' }}">
                                        <img src="{{ asset('storage/'.$photo)}}" alt="" data-zoom-image="{{ asset('storage/'.$photo)}}" />
                                    </div>
                                    @endforeach
                                </div>

                                <!-- sag sol -->
                                <a class='left carousel-control' href='#carousel-custom' data-slide='prev'>
                                    <i class="tf-ion-ios-arrow-left"></i>
                                </a>
                                <a class='right carousel-control' href='#carousel-custom' data-slide='next'>
                                    <i class="tf-ion-ios-arrow-right"></i>
                                </a>
                            </div>

                            <!-- thumb -->
                            <ol class='carousel-indicators mCustomScrollbar meartlab'>
                                @foreach($product->photos as $photo)
                                <li data-target="#carousel-custom" data-slide-to="{{ $loop->index + 1}}" class="{{ $loop->index == 0?'active':'' }}">
                                    <img src="{{ asset('storage/'.$photo)}}" alt="" />
                                </li>
                                @endforeach
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="single-product-details">
                        <h2>{{ $product->name }}</h2>
                        <p class="product-price">${{ $product->price }}</p>

                        <p class="product-description mt-20">
                            {{ $product->description }}
                        </p>
                        <div class="color-swatches">
                        </div>
                        <div class="product-size">
                            @foreach ($product->attributes as $attribute)
                            <span>{{ $attribute->name }} :</span>
                            <select name="{{ $attribute->name }}" id="{{ $attribute->name }}" onchange="specChanged('{{ $attribute->name }}')" class="form-control">
                                @php($values = explode(',' ,$attribute->pivot->values))
                                @foreach($values as $value)
                                <option value="{{ $value }}">{{ $value }}</option>
                                @endforeach
                            </select>
                            @endforeach
                        </div>
                        <div class="product-quantity">
                            <span>Quantity:</span>
                            <div class="product-quantity-slider">
                                <input wire:model="quantity" id="product-quantity" type="text" value="0" name="product-quantity">
                            </div>
                        </div>

                        <a wire:click="toCart" role="button" class="btn btn-main mt-20">Add To Cart</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="tabCommon mt-20">
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#details" aria-expanded="true">Details</a></li>
                        </ul>
                        <div class="tab-content patternbg">
                            <div id="details" class="tab-pane fade active in">
                                <h4>Product Description</h4>
                                <p>{{ $product->description }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            function specChanged(name) {
                let value = document.getElementById(name).value;
                Livewire.emit('specChanged', {
                    name,
                    value
                })
            }
        </script>
    </section>

    @if(count($relatedProducts))
    <section class="products related-products section">
        <div class="container">
            <div class="row">
                <div class="title text-center">
                    <h2>Related Products</h2>
                </div>
            </div>
            <div class="row">
                @foreach ($relatedProducts as $product)
                <div class="col-md-3">
                    <div class="product-item">
                        <div class="product-thumb">
                            <span class="bage">Sale</span>
                            <img class="img-responsive" src="{{ asset('storage/'. $product->photos[0] )}}" alt="product-img" />
                            <div class="preview-meta">
                                <ul>
                                    <li>
                                        <span data-toggle="modal" data-target="#product-modal">
                                            <i class="tf-ion-ios-search"></i>
                                        </span>
                                    </li>
                                    <li>
                                        <a wire:click="$emit('toCart', {{$product->id}})" href="#"><i class="tf-ion-ios-heart"></i></a>
                                    </li>
                                    <li>
                                        <a href="#!"><i class="tf-ion-android-cart"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-content">
                            <h4><a href="{{ route('shop.product-single', $product->id)}}">{{ $product->name }}</a></h4>
                            <p class="price">${{ $product->price }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- Modal -->
    <div class="modal product-modal fade" id="product-modal">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <i class="tf-ion-close"></i>
        </button>
        <div class="modal-dialog " role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="modal-image">
                                <img class="img-responsive" src="aida/images/shop/products/modal-product.jpg" />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="product-short-details">
                                <h2 class="product-title">GM Pendant, Basalt Grey</h2>
                                <p class="product-price">$200</p>
                                <p class="product-short-description">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem iusto nihil cum. Illo
                                    laborum numquam rem aut officia dicta cumque.
                                </p>
                                <a href="#!" class="btn btn-main">Add To Cart</a>
                                <a href="#!" class="btn btn-transparent">View Product Details</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>