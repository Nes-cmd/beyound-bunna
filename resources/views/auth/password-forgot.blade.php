
<x-guest-layout>
<section class="forget-password-page account">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-md-offset-3">
          <div class="block text-center">
            <a class="logo" href="index.html">
              <h2>{{ env('APP_NAME') }}</h2>
            </a>
            <h3 class="text-center">Welcome Back</h3>
            <form class="text-left clearfix" action="{{ url('forgot-password')}}" method="post">
              @csrf
              <p>Please enter the email address for your account. A verification code will be sent to you. Once you have
                received the verification code, you will be able to choose a new password for your account.</p>
              <div class="form-group">
                <input type="email" name="email" value="{{ old('email') }}" class="form-control" id="exampleInputEmail1" placeholder="Account email address">
              </div>
              <div class="text-center">
                @if (session('status'))
                <p style="color:rgb(10, 200, 10)">{{ session('status') }}</p>
                <button type="submit" class="btn btn-main text-center">Request again</button>
                @else
                <button type="submit" class="btn btn-main text-center">Request again</button>
                @endif
              </div>
            </form>
            <p class="mt-20"><a href="{{route('login')}}">Back to log in</a></p>
          </div>
        </div>
      </div>
    </div>
  </section>
</x-guest-layout>