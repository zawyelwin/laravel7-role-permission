@extends('admin.layouts.auth')

@section('auth')
<div class="col-md-6">
    <!-- <img src="/admin/img/login.png" class="mx-auto d-block" alt="Yoma Bank" height="200"> -->
    <div class="card-group">
        <div class="shadow-lg card">
            <div class="card-body p-5">
                <div class="text-center d-lg-none">
                    <img src="/admin/img/login.png" height="150">
                </div>
                
                <h1>Login</h1>
                <p class="text-muted">Sign In to your account</p>

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="cil-user"></i>
                            </span>
                        </div>
                        <input id="email" type="email"
                            class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                            value="{{ old('email') }}" placeholder="{{ __('Email Address') }}" required autofocus>

                        @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="cil-lock-locked"></i>
                            </span>
                        </div>
                        <input id="password" type="password"
                            class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"
                            placeholder="{{ __('Password') }}" required>

                        @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="input-group mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary px4">
                                {{ __('Login') }}
                            </button>
                        </div>
                        <div class="col-8 text-right">
                            <a class="btn btn-link px-0" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection