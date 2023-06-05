<div>
    @section('title') - Training @endsection
    @include('customer-shop.blocks.breadcrumb', ['page' => 'Training'])
    <div class="page-wrapper">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					@foreach($trainings as $training)
					<div class="post">
						<div class="post-media post-thumb">
							<a href="{{ route('training-detail', $training->id) }}">
								<img src="{{ asset('storage/'.$training->images[0]) }}" alt="">
							</a>
						</div>
						<h2 class="post-title"><a href="{{ route('training-detail', $training->id) }}">{{ $training->title }}</a></h2>
						<div class="post-meta">
							<ul>
								<li>
									<i class="tf-ion-ios-calendar"></i> {{ $training->created_at->format('D M m Y') }}
								</li>
								<li>
									<i class="tf-ion-android-person"></i> POSTED BY Admin
								</li>
							</ul>
						</div>
						<div class="post-content">
							<p>{{ $training->description }}</p>
							<a href="{{ route('training-detail', $training->id) }}" class="btn btn-main">Continue Reading</a>
						</div>

					</div>
					@endforeach
				</div>
			</div>
		</div>
    </div>
</div>