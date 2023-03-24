<x-guest-layout>
  <section class="signin-page account">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-md-offset-3">
          <div class="block text-center">
            <a class="logo" href="index.html">
              <img src="images/logo.png" alt="">
            </a>
            <h3 class="text-center">Welcome Back</h3>
            @if (session('status'))
            <p style="color:rgb(10, 200, 10) mb-5">{{ session('status') }}</p>
            @endif
            <form class="text-left clearfix"  method="post" action="{{ route('login')}}">
              @csrf
              <div class="form-group">
                <input type="email" class="form-control" name="email" value="{{ old('email')}}" placeholder="Email">
                @error('email')
                <span style="color:red;padding-left:3px">{{ $message }}</span>
                @enderror
              </div>
              <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="Password">
              </div>
              <div class="text-center">
                <button type="submit" class="btn btn-main text-center">Login</button>
              </div>
            </form>
            <p class="mt-20">New in this site ?<a href="{{ route('register')}}"> Create New Account</a></p>
            <p><a href="{{ url('forgot-password') }}"> Forgot your password?</a></p>
          </div>
        </div>
      </div>
    </div>
  </section>
</x-guest-layout>