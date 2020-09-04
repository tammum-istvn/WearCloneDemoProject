@extends('master')
@section('custom-css')
<style>

</style>
@endsection

@section('main')
{{ session()->put('backUrl',url()->previous())}}
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-10">

            <div class="card">
                <div class="card-header">{{ __('Registration') }}</div>

                <div class="card-body">
                    <article class="message is-info is-small">
                        <div class="message-body">
                            You do not have any account, please complete your registration !!
                        </div>
                    </article>
                    <div id="show_error" style="color:red">
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </div>

                    <form method="POST" action="{{ route('snsRegistration', $data) }}">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('register_form.name') }}</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $data['name'] }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="account-type" class="col-md-4 col-form-label text-md-right">{{ __('register_form.account_type') }}</label>

                            <div class="col-md-6" style="display:inline-flex">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="account_type" id="inlineRadio1" value="individual" checked>
                                    <label class="form-check-label" for="inlineRadio1">{{ __('register_form.individual')}}</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="account_type" id="inlineRadio2" value="shop">
                                    <label class="form-check-label" for="inlineRadio2">{{ __('register_form.shop')}}</label>
                                </div>
                            </div>
                        </div>
                        <!-- <input type="hidden" name="uuid" value="{{ $data['name'] }}" required autocomplete="name" autofocus> -->
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('register_form.register_btn') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection