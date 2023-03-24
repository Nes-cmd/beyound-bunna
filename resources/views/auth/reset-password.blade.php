<x-guest-layout>
  <section class="signin-page account">
    <div class="container">
      <div class="row">
        <div class="col-md-6 mx-auto">
          <div class="block text-center">
            <a class="logo" href="{{ route('shop.index')}}">
              <h2>{{ env('APP_NAME') }}</h2>
            </a>
            <h3 class="text-center">Welcome Back</h3>
            <form class="text-left clearfix" method="post" action="{{ url('reset-password')}}">
              @csrf
              <input type="hidden" value="{{ request()->route('token') }}" name="token">
              <div class="form-group">
                <input type="email" class="form-control" name="email" value="{{ old('email')}}" placeholder="Email">
                @error('email')
                <span style="color:red;padding-left:3px">{{ $message }}</span>
                @enderror
              </div>
              <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="Password">
              </div>
              <div class="form-group">
                <input type="password" name="password_confirmation" class="form-control" placeholder="Password Confirmation">
                @error('password')
                <span style="color:red;padding-left:3px">{{ $message }}</span>
                @enderror
              </div>
              <div class="text-center">
                <button type="submit" class="btn btn-primary">Reset password</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</x-guest-layout>