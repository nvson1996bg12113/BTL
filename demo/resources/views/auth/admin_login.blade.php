@extends('admin.layouts.login-index')

@section('content')
<div class="container">
    <div class="row justify-content-center algCenter">
        <div class="col-xs-12 col-md-8 col-lg-4 animation-login-form">
          <h3 style="margin-bottom: 35px;">Demo shop - Admin Login</h3>
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.login') }}">
                        @csrf

                        <div class="form-group rlPos animation-login-email" style="margin-bottom: 0px">
                          <span class="icon-login-form">
                            <div class="rlPos square">
                                <div class="fullScr algCenter">
                                    <i class="fa fa-user-circle-o 	fa fa-lock"></i>
                                </div>
                            </div>
                          </span>
                          <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group rlPos animation-login-pass">
                          <span class="icon-login-form">
                            <div class="rlPos square">
                                <div class="fullScr algCenter">
                                    <i class="fa fa-lock"></i>
                                </div>
                            </div>
                          </span>
                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary col-xs-12 animation-login-button">
                            {{ __('Login') }}
                            </button>
                        </div>
                        <div class="form-group col-xs-12 animation-login-checkbox" style="padding: 0px;">
                          <div class="form-check __lf">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                            </label>
                          </div>
                          <a class="__rg" href="{{ route('password.request') }}">
                              {{ __('Forgot Your Password?') }}
                          </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
