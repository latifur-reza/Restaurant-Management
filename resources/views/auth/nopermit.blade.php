@extends('layout.auth')
@section('content')
    <div class="content-wrapper d-flex align-items-center auth auth-bg-1 theme-one" style="background: url({!! asset('/images/auth/login_1.jpg') !!})">
      <div class="row w-100">
        <div class="col-lg-4 mx-auto">
          <div class="auto-form-wrapper">
            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="form-group" style="text-align: center">
                  <label class="label">Contact With Admin for Permission</label>
                </div>
              <div class="form-group">
                <label class="label">Email</label>
                <div class="input-group">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
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
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
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
                <button class="btn btn-primary submit-btn btn-block">Login</button>
              </div>
              <div class="form-group d-flex justify-content-between">
                <div class="form-check form-check-flat mt-0">
                  <label class="form-check-label">
                      <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> Keep me signed in
                    {{--<input type="checkbox" class="form-check-input" checked> Keep me signed in--}}
                  </label>
                </div>

              </div>

              <div class="text-block text-center my-3">
                <span class="text-small font-weight-semibold">Not a member ?</span>
                <a href="{{ route('register') }}" class="text-black text-small">Create new account</a>
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
