<x-customer-layout>
<!-- main wrapper -->
@section('title') - Page not found  @endsection
<!-- /main wrapper -->
<section class="page-404">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <a href="{{ url('/')}}">
            	<h2>{{ env('APP_NAME') }}</h2>
          </a>
          <h1>404</h1>
          <h2>Page Not Found</h2>
          <a href="{{ url('/')}}" class="btn btn-main"><i class="tf-ion-android-arrow-back"></i> Go Home</a>
        </div>
      </div>
    </div>
  </section>
</x-customer-layout>
