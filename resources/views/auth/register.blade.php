@extends('layout.auth')
@section('content')
    <div class="content-wrapper d-flex align-items-center auth auth-bg-1 theme-one" style="background: url({!! asset('/images/auth/login_1.jpg') !!})">
      <div class="row w-100">
        <div class="col-lg-4 mx-auto">
          <div class="auto-form-wrapper">
            <form action="{{ route('register') }}" method="post">
                @csrf
              <div class="form-group">
                <label class="label">Name</label>
                <div class="input-group">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                  {{--<input type="email" class="form-control" placeholder="mail@email.com" name="email" autofocus required>--}}
                  <div class="input-group-append">
                    <span class="input-group-text">
                      <i class="mdi mdi-check-circle-outline"></i>
                    </span>
                  </div>
                  @error('name')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
              </div>
              <div class="form-group">
                <label class="label">Email</label>
                <div class="input-group">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                  {{--<input type="email" class="form-control" placeholder="mail@email.com" name="email" autofocus required>--}}
                  <div class="input-group-append">
                    <span class="input-group-text">
                      <i class="mdi mdi-check-circle-outline"></i>
                    </span>
                  </div>
                  @error('email')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
              </div>
              <div class="form-group">
                <label class="label">Password</label>
                <div class="input-group">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                  {{--<input type="password" class="form-control" placeholder="*********" name="password" required>--}}
                  <div class="input-group-append">
                    <span class="input-group-text">
                      <i class="mdi mdi-check-circle-outline"></i>
                    </span>
                  </div>
                  @error('password')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
              </div>
              <div class="form-group">
                <label class="label">Confirm Password</label>
                <div class="input-group">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                  {{--<input type="password" class="form-control" placeholder="*********" name="password" required>--}}
                  <div class="input-group-append">
                    <span class="input-group-text">
                      <i class="mdi mdi-check-circle-outline"></i>
                    </span>
                  </div>

                </div>
              </div>
              <div class="form-group">
                <button class="btn btn-primary submit-btn btn-block">Register</button>
              </div>
              
              <div class="text-block text-center my-3">
                <span class="text-small font-weight-semibold">Already a member ?</span>
                <a href="{{ route('login') }}" class="text-black text-small">Log In</a>
              </div>
            </form>
          </div>
          <br>
          <br>
          <p class="footer-text text-center">Copyright © 2019 RMS. All rights reserved.</p>
        </div>
      </div>
    </div>
@endsection
