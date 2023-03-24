<x-customer-layout>
    @section('title') - Order @endsection
    @include('customer-shop.blocks.breadcrumb', ['page' => 'My Account / Orders'])

    <section class="user-dashboard page-wrapper">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<ul class="list-inline dashboard-menu text-center">
                        <li><a href="{{route('customer.dashboard.index')}}">Dashboard</a></li>
                        <li><a class="active"  href="{{route('customer.dashboard.order')}}">Orders</a></li>
                        <li><a href="{{route('customer.dashboard.address')}}">Address</a></li>
                        <li><a href="{{route('customer.dashboard.profile')}}">Profile Details</a></li>
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
                                    @php( $bage = ['received' => 'label-primary', 'complated' => 'label-success', 'cancelled' => 'label-danger', 'on-hold' => 'label-info', 'processing' => 'label-primary', 'else' => 'label-warning'])
                                    @foreach($orders as $order)
									<tr>
										<td>#{{ $order->orderId }}</td>
										<td>{{ $order->created_at->toDayDateTimeString() }}</td>
										<td>{{ count($order->orderDetails) }}</td>
										<td>{{$order->payment->total. ' Birr'}}</td>
										<td><span class="label {{array_key_exists($order->status, $bage)?$bage[$order->status]:$bage['else']}}">{{$order->payment->total}}</span></td>
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