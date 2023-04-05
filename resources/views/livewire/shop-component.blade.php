<div>

    @include('customer-shop.blocks.breadcrumb', ['page' => 'Shop'])
    <section class="products section">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="widget">
                        <h4 class="widget-title">Short By</h4>
                        <form method="post" action="#">
                            <select class="form-control">
                                <option>Man</option>
                                <option>Women</option>
                                <option>Accessories</option>
                                <option>Shoes</option>
                            </select>
                        </form>
                    </div>
                    <div class="widget product-category reveal">
                        <h4 class="widget-title">Categories</h4>
                        <div class="panel-group commonAccordion" id="accordion" role="tablist" aria-multiselectable="true">
                            @foreach ($menus as $menu)
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="{{'heading'.$menu->id }}">
                                    <h4 class="panel-title">
                                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#{{'collapse'.$menu->id }}" aria-expanded="true" aria-controls="collapseOne">{{ $menu->name }}</a>
                                    </h4>
                                </div>
                                <div id="{{'collapse'.$menu->id }}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="{{'heading'.$menu->id }}">
                                    <div class="panel-body">
                                        <ul>
                                            @foreach($menu->subCategory as $sub)
                                                <li><a role="button" wire:click="subcategory({{$sub->id}})" href="#!">{{ $sub->name }}</a></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>

                    </div>
                </div>
                <div class="col-md-9 reveal fade-right">
                    <div class="row">
                        @foreach($products as $product)
                        <div class="col-md-4">
                            <div class="product-item">
                                <div class="product-thumb">
                                    <img class="img-responsive" src="{{ asset('storage/'.$product->photos[0])}}" alt="product-img" />
                                    <div class="preview-meta">
                                        <ul>
                                            <li>
                                                <span data-toggle="modal" data-target="#product-modal">
                                                    <i class="tf-ion-ios-search-strong"></i>
                                                </span>
                                            </li>
                                            <li>
                                                <a wire:click="wishlit({{$product->id}})" href="#!"><i class="tf-ion-ios-heart"></i></a>
                                            </li>
                                            <li>
                                                <a wire:click="$emit('toCart' , {{$product->id}} )" href="#!"><i class="tf-ion-android-cart"></i></a>
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


                        <!-- Modal -->
                        <div class="modal product-modal fade" id="product-modal">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <i class="tf-ion-close"></i>
                            </button>
                            <div class="modal-dialog " role="document">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-8 col-sm-6 col-xs-12">
                                                <div class="modal-image">
                                                    <img class="img-responsive" src="images/shop/products/modal-product.jpg" alt="product-img" />
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-6 col-xs-12">
                                                <div class="product-short-details">
                                                    <h2 class="product-title">GM Pendant, Basalt Grey</h2>
                                                    <p class="product-price">$200</p>
                                                    <p class="product-short-description">
                                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem
                                                        iusto nihil cum. Illo laborum numquam rem aut officia dicta
                                                        cumque.
                                                    </p>
                                                    <a href="cart.html" class="btn btn-main">Add To Cart</a>
                                                    <a href="product-single.html" class="btn btn-transparent">View
                                                        Product Details</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.modal -->
                        <div class="col-12 mt-5" style="margin-bottom: 14px;">
                            <nav>
                                <ul class="pagination justify-content-center">
                                    {{ $products->links() }}
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>