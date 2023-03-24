<x-customer-layout>
    @section('title') - Dashboard @endsection
    @include('customer-shop.blocks.breadcrumb', ['page' => 'My account'])

    <section class="user-dashboard page-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="list-inline dashboard-menu text-center">
                        <li><a class="active" href="{{route('customer.dashboard.index')}}">Dashboard</a></li>
                        <li><a href="{{route('customer.dashboard.order')}}">Orders</a></li>
                        <li><a href="{{route('customer.dashboard.address')}}">Address</a></li>
                        <li><a href="{{route('customer.dashboard.profile')}}">Profile Details</a></li>
                    </ul>
                    <div class="dashboard-wrapper user-dashboard">
                        <div class="media">
                            <div class="pull-left">
                                @if (auth()->user()->photo_path != null)
                                <img class="media-object user-img rounded-cirle" src="{{ asset('storage/'.auth()->user()->photo_path)}}" alt="Image">
                                @else
                                <img class="media-object user-img rounded-cirle" src="{{ asset('customer/images/avatar.jpg')}}" alt="Image">
                                @endif
                            </div>
                            <div class="media-body">
                                <h2 class="media-heading">Welcome {{auth()->user()->first_name.' '.auth()->user()->last_name}}</h2>
                                <p class="mb-0">Here is your history of purhase with us. Thanks for using {{ env('APP_NAME') }}</p>
                            </div>
                        </div>
                        <div class="total-order mt-20">
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
                                            <td>#{{ $order->orderId }}</td>
                                            <td>{{ $order->created_at->toDayDateTimeString() }}</td>
                                            <td>{{ count($order->orderDetails) }}</td>
                                            <td>{{$order->payment->total.' Birr'}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div style="display: flex;justify-content:end;">
                        <form action="{{ route('logout')}}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-secondary rounded-0">Signout</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-customer-layout>