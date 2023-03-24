<div class="main-wrapper">
    <!-- breadcrumb -->
    @section('title') - Wishlist  @endsection
    @include('customer-shop.blocks.breadcrumb', ['page' => 'Wishlist'])
    <!-- /breadcrumb -->
    <div class="section">
        <div class="cart shopping"> 
            <div class="container">
                <div class="row" style="border-radius:6px">
                    <div class="col-md-10 mx-auto">
                        <div class="block">
                            <div class="product-list">
                                <div class="table-responsive">
                                    <table class="table cart-table">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Image</th>
                                                <th>Product Name</th>
                                                <th>Price</th>
                                                <th>Added at</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($wishlists as $wishlist)
                                            <tr>
                                                <td>
                                                    <button wire:click="removeWishlist({{$wishlist->id}})" class="product-remove border-0">&times;</button>
                                                </td>
                                                <td>
                                                    <img width="60px" class="img-fluid" src="{{ asset('storage/'.$wishlist->products->photos[0]) }}" alt="product-img" />
                                                </td>
                                                <td>
                                                    <div class="product-info">
                                                        <a href="#">{{$wishlist->products->name}}</a>
                                                    </div>
                                                </td>
                                                <td>${{$wishlist->products->price}}
                                                    
                                                </td>
                                                <td >
                                                    {{$wishlist->created_at->diffForHumans()}}
                                                </td>
                                                <td>
                                                    <button wire:click="$emit('toCart', {{$wishlist->product_id}})" class="btn btn-primary mb-4">Add to cart</button>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>