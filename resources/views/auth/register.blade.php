<x-guest-layout>
  <section class="signin-page account">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-md-offset-3">
          <div class="block text-center">
            <a class="logo" href="{{ route('shop.index')}}">
              <h2>{{ env('APP_NAME') }}</h2>
            </a>
            <h3 class="text-center">Create Your Account</h3>
            <form class="text-left clearfix" method="post" action="{{ route('register')}}">
              @csrf
              <div class="form-group">
                <input type="text" name="first-name" value="{{ old('first-name')}}" class="form-control" placeholder="First Name">
                @error('first-name')
                  <span style="color:red;padding-left:3px">{{ $message }}</span>
                @enderror
              </div>
              <div class="form-group">
                <input type="text" name="last-name" value="{{ old('last-name')}}" class="form-control" placeholder="Last Name">
                @error('last-name')
                  <span style="color:red;padding-left:3px">{{ $message }}</span>
                @enderror
              </div>
              <div class="form-group">
                <input type="email" name="email" value="{{ old('email')}}" class="form-control" placeholder="Email">
                @error('email')
                  <span style="color:red;padding-left:3px">{{ $message }}</span>
                @enderror
              </div> 
              <div class="form-group">
                <input type="tel" name="phone" value="{{ old('phone')}}" class="form-control" placeholder="Phone">
                @error('phone')
                  <span style="color:red;padding-left:3px">{{ $message }}</span>
                @enderror
              </div>
              <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="Password">
                @error('password')
                  <span style="color:red;padding-left:3px">{{ $message }}</span>
                @enderror
              </div>
              <div class="form-group">
                <input type="password" name="password-confirmation" class="form-control" placeholder="Password confirmation">
              </div>
              <div class="text-center">
                <button type="submit" class="btn btn-main text-center">Register</button>
              </div>
            </form>
            <p class="mt-20">Already hava an account ?<a href="{{ route('login')}}">> Login</a></p>
            <p><a href="{{ url('forgot-password') }}"> Forgot your password?</a></p>
          </div>
        </div>
      </div>
    </div>
  </section>
</x-guest-layout>