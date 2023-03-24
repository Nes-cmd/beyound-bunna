<x-customer-layout>
<div class="main-wrapper">
    @section('title') -   @endsection
    <!-- breadcrumb -->
    <nav class="bg-gray py-3">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('shop.index')}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Blog</li>
            </ol>
        </div>
    </nav>
    <!-- /breadcrumb -->

    <div class="section">
        <div class="container">
            <div class="row">
                @foreach ($posts as $post)
                <div class="col-md-6">
                    <div class="post">
                        <div class="post-thumb">
                            <a href="blog-single.html">
                                <img class="img-fluid" src="{{$post->path}}" alt="">
                            </a>
                        </div>
                        <h3 class="post-title"><a href="blog-single.html">{{$post->title}}</a></h3>
                        <div class="post-meta">
                            <ul>
                                <li>
                                    <i class="ti-calendar"></i> {{$post->created_at->diffForHumans()}}
                                </li>
                                <li>
                                    <i class="ti-user"></i> {{'Posted by '.$post->posted_by}}
                                </li>
                            </ul>
                        </div>
                        <div class="post-content">
                            <p>{{ $post->description }}</p>
                            <a href="blog-single.html" class="btn btn-primary btn-sm">Continue Reading</a>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="col-12">
                    <nav aria-label="Page navigation">
                       {{$posts->links()}}
                    </nav>
                </div>
            </div>
        </div>
    </div>
</x-customer-layout>