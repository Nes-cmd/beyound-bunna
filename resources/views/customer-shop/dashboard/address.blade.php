<x-customer-layout>
    @section('title') - Customer Adress @endsection
    @include('customer-shop.blocks.breadcrumb', ['page' => 'My Account / Adress'])
    <section class="user-dashboard page-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="list-inline dashboard-menu text-center">
                        <li class="list-inline-item"><a href="{{route('customer.dashboard.index')}}">Dashboard</a></li>
                        <li class="list-inline-item"><a href="{{route('customer.dashboard.order')}}">Orders</a></li>
                        <li class="list-inline-item"><a class="active" href="{{route('customer.dashboard.address')}}">Address</a></li>
                        <li class="list-inline-item"><a href="{{route('customer.dashboard.profile')}}">Profile Details</a></li>
                    </ul>
                    <div class="dashboard-wrapper user-dashboard">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <td>Name</td>
                                        <th>Country</th>
                                        <th>Address</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($adresses as $adress)
                                    <tr>
                                        <td>{{ $adress->fullname }}</td>
                                        <td>{{ $adress->country->name }}</td>
                                        <td>{{ makeFullAdress($adress->city->name,  $adress->province_name,$adress->postal_code, $adress->addressLine1,$adress->addressLine2 ) }}</td>
                                        <td>{{ $adress->phone }}</td>
                                        <td>{{ $adress->email }}</td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <button type="button" class="btn btn-default"><i class="tf-pencil2" aria-hidden="true"></i></button>
                                                <button type="button" class="btn btn-default"><i class="tf-ion-close" aria-hidden="true"></i></button>
                                            </div>
                                        </td>
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