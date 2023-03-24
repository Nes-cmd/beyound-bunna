<section class="signin-page account">
@section('title') - Edit Account  @endsection
  <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.min.js"></script>
  <div class="container">
    <div class="row">
      <div class="col-md-6 mx-auto" style="align-items: center;">
        <div class="block text-center">
          <h2 class="text-center">Edit profile</h2>
          <form class="text-left clearfix" method="post" wire:submit.prevent="update">
            @csrf
            <div class="form-group">
              <input type="text" wire:model.lazy="user.first_name" class="form-control" placeholder="First Name">
            </div>
            @error('user.first_name')
            <span style="color:red;padding-left:3px">{{ $message }}</span>
            @enderror
            <div class="form-group">
              <input type="text" wire:model.lazy="user.last_name" class="form-control" placeholder="Last Name">
            </div>
            @error('user.last_name')
            <span style="color:red;padding-left:3px">{{ $message }}</span>
            @enderror
            <div class="form-group">
              <input type="email" disabled wire:model="user.email" class="form-control" placeholder="Email">
            </div>
            @error('user.email')
            <span style="color:red;padding-left:3px">{{ $message }}</span>
            @enderror
            <div class="form-group">
              <input type="text" wire:model.lazy="user.phone" class="form-control" placeholder="Phone eg">
            </div>
            @error('user.phone')
            <span style="color:red;padding-left:3px">{{ $message }}</span>
            @enderror
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroupFileAddon01">Profile photo</span>
              </div>
              <div class="custom-file">
                <input type="file" accept="jpg" wire:model="photo" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
              </div>
            </div>
            @error('photo')
            <span style="color:red;padding-left:3px">{{ $message }}</span>
            @enderror
            <div class="text-center mb-3">
              @if($photo)
              <img height="150px" width="150px" class="rounded-circle" src="{{ $photo->temporaryUrl() }}">
              @elseif($user->photo_path != null)
              <img height="150px" width="150px" class="rounded-circle" src="{{ asset('storage/'.$user->photo_path )}}">
              @endif
            </div>
            <div class="text-center">
              <button type="submit" class="btn btn-primary">Update</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>