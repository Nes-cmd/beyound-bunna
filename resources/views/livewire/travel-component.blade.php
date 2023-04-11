<div>
@section('title') - About Us @endsection
    @include('customer-shop.blocks.breadcrumb', ['page' => 'Travel'])

    <div class="page-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <aside class="sidebar">
                        <div class="widget widget-subscription">
                            <h4 class="widget-title">Get notified updates</h4>
                            <form>
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Your Email Address">
                                </div>
                                <button type="submit" class="btn btn-main">I am in</button>
                            </form>
                        </div>

                        <!-- Widget Latest Posts -->
                        <div class="widget widget-latest-post">
                            <h4 class="widget-title">Recents Travels</h4>
                            @foreach($recentTravels as $recentTravel)
                            <div class="media">
                                <a class="pull-left" href="{{ route('travel-detail', $recentTravel->id) }}">
                                    <img  style="height:70%"  class="media-object" src="{{('storage/'.$recentTravel->images[0] )}}" alt="Image">
                                </a>
                                <div class="media-body">
                                    <h4 class="media-heading"><a href="{{ route('travel-detail', $recentTravel->id) }}">{{ $recentTravel->title }}</a></h4>
                                    <p class="trunk-4">{{ $recentTravel->description }}</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <!-- End Latest Posts -->
                    </aside>
                </div>
                <div class="col-md-8">
                    @foreach($travels as $travel)
                    <div class="post">
                        <div class="post-media post-thumb">
                            <a href="{{ route('travel-detail', $travel->id) }}">
                                <img style="height:300px" src="{{ asset('storage/'.$travel->images[0]) }}" alt="">
                            </a>
                        </div>
                        <h2 class="post-title"><a href="{{ route('travel-detail', $travel->id) }}">{{ $travel->title }}</a></h2>
                        <div class="post-meta">
                            <ul>
                                <li>
                                    <i class="tf-ion-ios-calendar"></i> {{ $travel->created_at->format('D M m Y') }}
                                </li>
                                <li>
                                    <i class="tf-ion-android-person"></i> POSTED BY ADMIN
                                </li>
                                <li>
                                    <a href="#!"><i class="tf-ion-ios-pricetags"></i> Tags:</a>
                                    @foreach($travel->tags as $tag)
                                       <a href="#!">{{ $tag }}</a>
                                    @endforeach
                                </li>
                               
                            </ul>
                        </div>
                        <div class="post-content">
                            <p>{{ $travel->description }}</p>
                            <a href="{{ URL::to('travel-detail/'.$travel->id.'#booknow') }}" class="btn btn-main">Book Now</a>
                            <a href="{{ route('travel-detail', $travel->id) }}" class="btn btn-solid-border">Travel Detail</a>
                        </div>

                    </div>
                    @endforeach
                    <!-- <div class="text-center">
                        <ul class="pagination post-pagination">
                            <li><a href="#!">Prev</a>
                            </li>
                            <li class="active"><a href="#!">1</a>
                            </li>
                            <li><a href="#!">2</a>
                            </li>
                            <li><a href="#!">3</a>
                            </li>
                            <li><a href="#!">4</a>
                            </li>
                            <li><a href="#!">5</a>
                            </li>
                            <li><a href="#!">Next</a>
                            </li>
                        </ul>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</div>
