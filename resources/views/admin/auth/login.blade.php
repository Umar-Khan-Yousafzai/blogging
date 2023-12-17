@include('admin.includes.styles')

<section class="hold-transition login-page">
  <div class="login-box">

    <div class="card card-outline card-primary">
      <div class="text-center card-header">
        <a href="{{route('home')}}" class="h1"><b>Get</b>Healthy</a>
      </div>
      <div class="card-body">
        <!-- <p class="login-box-msg">Sign in</p> -->

        <form action="{{ route('login.perform') }}" method="POST">
          @csrf
          @if($errors->any())
            <span class="is-invalid">
          <h6 style="color:#FF3333;">{{$errors->first()}}</h6>
            </span>
        @endif
          <div class="mb-3 input-group">
            <input type="email" name="email" class="form-control" placeholder="Email">

            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="mb-3 input-group">
            <input type="password" name="password" class="form-control" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-8">
              <div class="icheck-primary">
                <input type="checkbox" id="remember">
                <label for="remember">
                  Remember Me
                </label>
              </div>
            </div>

            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">Sign In</button>
            </div>

          </div>
        </form>

        <!-- <div class="mt-2 mb-3 text-center social-auth-links">
        <a href="#" class="btn btn-block btn-primary">
          <i class="mr-2 fab fa-facebook"></i> Sign in using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="mr-2 fab fa-google-plus"></i> Sign in using Google+
        </a>
      </div> -->
        <!-- /.social-auth-links -->

        <p class="mb-1">
          <a href="forgot-password.html">I forgot my password</a>
        </p>
        <p class="mb-0">
          <a href="register.html" class="text-center">Register a new membership</a>
        </p>
      </div>

    </div>

  </div>
  @include('admin.includes.scripts')
</section>
