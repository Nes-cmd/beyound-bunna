<x-customer-layout>
@section('title') - Customer Profile  @endsection
<!-- main wrapper -->
<div class="main-wrapper">

    <!-- breadcrumb -->
    <nav class="bg-gray py-3">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">My Accounts</li>
            </ol>
        </div>
    </nav>
    <!-- /breadcrumb -->

    <section class="user-dashboard section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="list-inline dashboard-menu text-center">
                    <li class="list-inline-item"><a href="{{route('customer.dashboard.index')}}">Dashboard</a></li>
                        <li class="list-inline-item"><a href="{{route('customer.dashboard.order')}}">Orders</a></li>
                        <li class="list-inline-item"><a href="{{route('customer.dashboard.address')}}">Address</a></li>
                        <li class="list-inline-item"><a class="active" href="{{route('customer.dashboard.profile')}}">Profile Details</a></li>
                    </ul>
                    <div class="dashboard-wrapper dashboard-user-profile">
                        <div class="media">
                            <div class="text-center">
                                @if ($user->photo_path != null)
                                <img class="rounded-circle" width="150px" height="150px" src="{{ asset('storage/'.$user->photo_path)}}" alt="Image">
                                @else
                                <img class="media-object user-img" width="150px" height="150px" src="{{ asset('customer/images/avatar.jpg')}}" alt="Image">
                                @endif
                                <a href="{{route('customer.dashboard.edit-profile')}}" class="btn btn-sm btn-secondary text-white mt-3 d-block">Edit profile</a>
                            </div>
                            <div class="media-body">
                                <ul class="user-profile-list">
                                    <li><span>Full Name:</span>{{$user->first_name.' '.$user->last_name}}</li>
                                    <li><span>Country:</span>Ethiopia</li>
                                    <li><span>Email:</span>{{$user->email}}</li>
                                    <li><span>Phone:</span>{{$user->phone}}</li>
                                    <li><span>Registered at:</span>{{ $user->created_at->toDateString() }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-customer-layout>