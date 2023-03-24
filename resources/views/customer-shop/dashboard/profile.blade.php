<x-customer-layout>
    @section('title') - Customer Profile  @endsection
    @include('customer-shop.blocks.breadcrumb', ['page' => 'My Account / Profile'])
    <section class="user-dashboard page-wrapper">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<ul class="list-inline dashboard-menu text-center">
                        <li><a href="{{route('customer.dashboard.index')}}">Dashboard</a></li>
                        <li><a href="{{route('customer.dashboard.order')}}">Orders</a></li>
                        <li><a href="{{route('customer.dashboard.address')}}">Address</a></li>
                        <li><a class="active" href="{{route('customer.dashboard.profile')}}">Profile Details</a></li>
					</ul>
					<div class="dashboard-wrapper dashboard-user-profile">
						<div class="media">
							<div class="pull-left text-center" href="#!" style="display: flex;flex-direction:column;">
                                @if ($user->photo_path != null)
                                <img style="border-radius: 50%;" width="150px" height="150px" src="{{ asset('storage/'.$user->photo_path)}}" alt="Image">
                                @else
                                <img class="media-object user-img" width="150px" height="150px" src="{{ asset('customer/images/avatar.jpg')}}" alt="Image">
                                @endif
								<a href="{{route('customer.dashboard.edit-profile')}}" class="btn btn-transparent mt-20">Change Profile</a>
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