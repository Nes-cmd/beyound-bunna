<section class="page-wrapper">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="post post-single">
					<div class="post-thumb">
						<img width="100%" height="400px" src="{{ asset('storage/'.$training->images[0]) }}" alt="">
					</div>
					<h2 class="post-title">{{ $training->title }}</h2>
					<div class="post-content post-excerpt">
						<p>{{ $training->description }}</p>
					</div>

					<div id="booknow" class="post-comments-form mb-4">
						<h3 class="post-sub-heading">Register Now</h3>
						<form method="post" wire:submit.prevent="book" id="form" role="form">

							<div class="row">

								<div class="col-md-6 form-group">
									<!-- Name -->
									<input wire:model.lazy="name" type="text" name="name" id="name" class=" form-control" placeholder="Full Name *" maxlength="100" required="">
									@error('name') <span style="color:red">{{ $message }}</span> @enderror
								</div>

								<div class="col-md-6 form-group">
									<!-- Email -->
									<input wire:model.lazy="phone" type="tel" name="phone" id="phone" class=" form-control" placeholder="Phone number *" maxlength="100" required="">
									@error('phone') <span style="color:red">{{ $message }}</span> @enderror
								</div>


								<div class="form-group col-md-6">
									<!-- Website -->
									<input wire:model.lazy="email" type="email" name="email" id="email" class=" form-control" placeholder="Email" maxlength="100">
								</div>

								<div class="form-group col-md-6">
									<!-- Website -->
									<input wire:model.lazy="adress" type="text" name="adress" id="edress" class=" form-control" placeholder="Your Adress" maxlength="10">
								</div>

								<!-- Comment -->
								<div class="form-group col-md-12">
									<textarea wire:model.lazy="comment" name="text" id="text" class=" form-control" rows="6" placeholder="Comment" maxlength="400"></textarea>
								</div>

								<!-- Send Button -->
								<div class="form-group col-md-12">
									<button type="submit" class="btn btn-large col-md-4 col-sm-12 btn-main ">
										Register
									</button>
								</div>
							</div>

						</form>
					</div>
				</div>

			</div>
		</div>
	</div>
</section>