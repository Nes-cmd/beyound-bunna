<x-customer-layout>
<!-- main wrapper -->
@section('title') - Page not found  @endsection
<div class="main-wrapper">

	<section class="page-404 section">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<a href="{{ url('/')}}">
						<!-- <img src="images/logo.png" alt="site logo" /> -->
						<h2>SHOP-KAGER</h2>
					</a>
					<h1>404</h1>
					<h2>Page Not Found</h2>
					<a href="{{ url('/')}}" class="btn btn-primary mt-4"><i class="ti-angle-double-left"></i> Go Home</a>
				</div>
			</div>
		</div>
	</section>

</div>
<!-- /main wrapper -->
</x-customer-layout>
