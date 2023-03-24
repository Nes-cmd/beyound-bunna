<x-customer-layout>
@section('title') - Order  @endsection
<!-- main wrapper -->
<div class="main-wrapper">

    <!-- breadcrumb -->
    <nav class="bg-gray py-3">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
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
                        <li class="list-inline-item"><a class="active" href="{{route('customer.dashboard.order')}}">Orders</a></li>
                        <li class="list-inline-item"><a href="{{route('customer.dashboard.address')}}">Address</a></li>
                        <li class="list-inline-item"><a href="{{route('customer.dashboard.profile')}}">Profile Details</a></li>
                    </ul>
                    <div class="dashboard-wrapper user-dashboard">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Order ID</th>
                                        <th>Date</th>
                                        <th>Items</th>
                                        <th>Total Price</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php( $bage = ['received' => 'badge-primary', 'complated' => 'badge-success', 'cancelled' => 'badge-danger', 'on-hold' => 'badge-info', 'processing' => 'badge-primary', 'else' => 'badge-warning'])
                                    @foreach($orders as $order)
                                    <tr>
                                        <td>#{{ $order->orderId }}</td>
                                        <td>{{ $order->created_at->toDayDateTimeString() }}</td>
                                        <td>{{ count($order->orderDetails) }}</td>
                                        <td>$ {{$order->payment->total}}</td>
                                        <td><span class="badge {{array_key_exists($order->status, $bage)?$bage[$order->status]:$bage['else']}} ">{{ $order->status }}</span></td>
                                        
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-customer-layout>