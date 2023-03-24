<x-customer-layout>
    <!-- main wrapper -->
    <div class="main-wrapper">
    @section('title') - Dashboard  @endsection
        <!-- breadcrumb -->
        <nav class="bg-gray py-3">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('shop.index')}}">Home</a></li>
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
                            <li class="list-inline-item"><a class="active" href="{{route('customer.dashboard.index')}}">Dashboard</a></li>
                            <li class="list-inline-item"><a href="{{route('customer.dashboard.order')}}">Orders</a></li>
                            <li class="list-inline-item"><a href="{{route('customer.dashboard.address')}}">Address</a></li>
                            <li class="list-inline-item"><a href="{{route('customer.dashboard.profile')}}">Profile Details</a></li>
                        </ul>
                        <div class="dashboard-wrapper user-dashboard">
                            <div class="media">
                                <div class="pull-left mr-3">
                                    @if (auth()->user()->photo_path != null)
                                    <img class="media-object user-img rounded-cirle" src="{{ asset('/storage/'.auth()->user()->photo_path)}}" alt="Image">
                                    @else
                                    <img class="media-object user-img rounded-cirle" src="{{ asset('customer/images/avatar.jpg')}}" alt="Image">
                                    @endif
                                </div>
                                <div class="media-body align-self-center">
                                    <h2 class="media-heading">Welcome <i class="text-primary">{{auth()->user()->first_name.' '.auth()->user()->last_name}}</i></h2>
                                    <p class="mb-0">Here is your history of purhase with us. Thanks for using Shopping Ka'Ger.</p>
                                </div>
                            </div>
                            <div class="total-order mt-4">
                                <h4>Total Orders</h4>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Order ID</th>
                                                <th>Date</th>
                                                <th>Items</th>
                                                <th>Total Price</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($orders as $order)
                                            <tr>
                                                <td><a href="#">#{{ $order->orderId }}</a></td>
                                                <td>{{ $order->created_at->toDayDateTimeString() }}</td>
                                                <td>{{ count($order->orderDetails) }}</td>
                                                <td>$ {{$order->payment->total}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="float-right">
                            <form action="{{ route('logout')}}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-dark rounded-0">Signout</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
</x-customer-layout>