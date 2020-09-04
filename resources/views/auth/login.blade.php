@extends('master')
@section('custom-css')
<style>
    a {
        text-decoration: none !important;
    }

    .signin-div {
        width: 180px;
        margin-bottom: 5px;
    }

    .signin-div a {
        padding: 5px 10px;
    }

    .signin-div a img {
        height: 30px;
        width: 30px;
    }

    .signin-div a span {
        margin-left: 20px;
    }

    .login-body {
        min-height: 300px;
    }
</style>
@endsection

@section('main')
{{-- saving the backpage for redirecting --}}
{{ session()->put('backUrl',url()->previous())}}
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('login_form.card_header') }}</div>

                <div class="card-body">
                    <div class="columns is-vcentered login-body">
                        <div class="column is-two-thirds-tablet is-three-quarters-desktop" style="border-right: 1px dotted">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('login_form.email') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('login_form.password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- remember me option  -->

                                <!-- <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('login_form.remember') }}
                                    </label>
                                </div>
                            </div>
                        </div> -->

                                <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-4">

                                        <input id="carts" type="hidden" name="carts">

                                        <button type="submit" class="btn btn-primary">
                                            {{ __('login_form.login_btn') }}
                                        </button>

                                        <!-- @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('login_form.forgot_password') }}
                                    </a>
                                @endif -->
                                        <!-- <span>
                                    {{ __('login_form.have_account') }} <a href="{{ route('register') }}"> {{__('login_form.registration')}} </a>
                                </span> -->
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="column" style="text-align: -webkit-center">
                            <p class="title is-size-6 mb-3">Sign in with</p>

                            <div class="card signin-div">
                                <a href="{{ route('redirectTo','facebook') }}">
                                    <img src="{{asset('img/sns/facebook.png')}}">
                                    <span>Facebook</span>
                                </a>
                            </div>

                            <div class="card signin-div mt-2">
                                <a href="{{ route('redirectTo','google') }}">
                                    <img src="{{asset('img/sns/google.png')}}">
                                    <span>Google</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
@section('script')
<script>
    $(document).ready(function() {
        var carts = JSON.parse(localStorage.getItem('cart'));
        $('#carts').val(localStorage.getItem('cart'));
    });
</script>
@endsection