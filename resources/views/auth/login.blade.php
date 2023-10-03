@extends('layouts.app')

@push('styles')
<style>
    #login-form-wrap {
        display: flex;
        height: 100vh;
        align-items: center;
        justify-content: center;
    }

    #login-form-wrap>.card {
        width: 400px;
        border-radius: 8px;
    }

</style>
@endpush

@section('content')
<div id="login-form-wrap">
    <div class="card font-roboto card-shadow z-depth-0">
        <div class="card-body pt-0 px-4 pb-4">
            <div class="text-center">
                <img class="img-responsive rounded-circle bg-white p-2" src="{{ asset('assets/img/nep-gov-logo-sm.png') }}" alt="" style="height: 100px; width: 110px; margin-top: -35px;">
            </div>
            <h2 class="h2-responsive text-center font-weight-bold my-4">{{ __('Login') }}</h2>
            <div class="my-5"></div>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <input type="email" id="email" name="email" class="form-control grey lighten-5 p-4  @error('email') is-invalid @enderror" placeholder="Email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="password" id="password" name="password" class="form-control grey lighten-5 p-4 @error('password') is-invalid @enderror" placeholder="Password" required autocomplete="current-password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>

                <div class="form-group text-center">
                    <button type="submit" class="btn btn-primary btn-block z-depth-0 rounded">
                        {{ __('Login') }}
                    </button>

                    @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                    @endif
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
