<x-customer-layout>
	<!-- about -->
	@section('title') - About Us @endsection
	@include('customer-shop.blocks.breadcrumb', ['page' => 'About'])
	<section class="about section">
		<div class="container">
			<div class="row reveal fade-right active">
				<div class="col-md-6">
					<img class="img-responsive" src="{{ asset('aida/images/about/aboutAida.jpg')}}">
				</div>
				<div class="col-md-6">
					<h2 class="mt-40">About Aida's Coffee</h2>
					<p>Born in Ethiopia the origin of coffee, Aida Eskender launched her company Beyond Buna in 2023.
						Beyond Buna arose from a love of great coffee and the desire to promote African coffee roasters.
					</p>

					<p>The platform allows specialty coffee roasters across Africa to market and sell their roasted coffee online.
						And if you are a coffee lover at heart, this platform subsequently provides coffee training programs.</p>

					<p>Beyond Buna will offer a range of coffee courses and master classes to expand your knowledge about
coffee and brewing technique. </p>
					<a href="{{ route('shop.contact')}}" class="btn btn-main mt-20">Download Company Profile</a>
				</div>
			</div>
			<div class="row mt-40">
				<div class="col-md-3 text-center">
					<img src="{{ asset('aida/images/about/awards-logo.png')}}">
				</div>
				<div class="col-md-3 text-center">
					<img src="{{ asset('aida/images/about/awards-logo.png')}}">
				</div>
				<div class="col-md-3 text-center">
					<img src="{{ asset('aida/images/about/awards-logo.png')}}">
				</div>
				<div class="col-md-3 text-center">
					<img src="{{ asset('aida/images/about/awards-logo.png')}}">
				</div>
			</div>
		</div>
	</section>

	<div class="section video-testimonial bg-1 overly-white text-center mt-50">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h2>Video presentation</h2>
					<a class="play-icon" href="https://www.youtube.com/watch?v=oyEuk8j8imI&amp;rel=0" data-toggle="lightbox">
						<i class="tf-ion-ios-play"></i>
					</a>
				</div>
			</div>
		</div>
	</div>
</x-customer-layout>