<section class="products section bg-gray reveal fade-bottom">
		<div class="container">
			<div class="row">
				<div class="title text-center">
					<h2>Top Products</h2>
				</div>
			</div>
			<div class="row">
        		@foreach ($collections as $product)
				<div class="col-md-4">
					<div class="product-item">
						
						<div class="product-thumb">
							<span class="bage">Sale</span>
							<a  href="{{ route('shop.product-single', $product->id) }}">
								<img class="img-responsive" src="{{ asset('storage/'.$product->photos[0])}}" alt="product-img" />
							</a>
							<div class="preview-meta">
								<ul>
									<li>
										<span data-toggle="modal" data-target="#product-modal">
											<i class="tf-ion-ios-search-strong"></i>
										</span>
									</li>
									<li>
										<a href="#!"><i class="tf-ion-ios-heart"></i></a>
									</li>
									<li>
										<a href="{{ route('shop.product-single', $product->id) }}"><i class="tf-ion-android-cart"></i></a>
									</li>
								</ul>
							</div>
						</div>
						
						<div class="product-content">
							<h4><a href="{{ route('shop.product-single', $product->id) }}">{{ $product->name }}</a></h4>
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
											<img class="img-responsive" src="aida/images/shop/products/modal-product.jpg"
												alt="product-img" />
										</div>
									</div>
									<div class="col-md-4 col-sm-6 col-xs-12">
										<div class="product-short-details">
											<h2 class="product-title">GM Pendant, Basalt Grey</h2>
											<p class="product-price">$200</p>
											<p class="product-short-description">
												Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem iusto
												nihil cum. Illo laborum numquam rem aut officia dicta cumque.
											</p>
											<a href="cart.html" class="btn btn-main">Add To Cart</a>
											<a href="product-single.html" class="btn btn-transparent">View Product
												Details</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
        <!-- /.modal -->
			</div>
		</div>
	</section>