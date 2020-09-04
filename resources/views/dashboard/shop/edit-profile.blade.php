@extends('layouts.dashboard')
@section('dashboard.style')
<style>
    .fa-asterisk {
        font-size: 7pt;
        color: #ff000085;
    }

</style>
@endsection
@section('menu-content')
<div class="card">
    <div class="card-header">{{ __('edit_profile_shop.card_name') }}</div>
    <div class="card-body">
        <form method="POST"
            action="{{ route('shop.profileUpdate',Auth::user()->id) }}">
            @method('patch')
            @csrf
            <div class="form-group row">
                @if(session('message'))
                    <div class="alert alert-success mx-auto" role="alert">
                        <span class="alert ">{{ session('message') }} </span>
                    </div>
                @endif
            </div>
            <div class="form-group row">
                <label for="userId"
                    class="col-md-4 col-form-label text-md-right">{{ __('edit_profile_shop.shop_id') }}</label>

                <div class="col-md-6">
                    <div>
                        <span
                            class="align-middle">{{ Auth::user()->id }}</span>
                    </div>
                    <div>
                        <a
                            href="{{ route('shop.profile', Auth::user()->id) }}">snappinvn.com/shop/{{ Auth::user()->id }}</a>
                    </div>
                    <div style="color:red">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('edit_profile_shop.name') }}
                    <i class="fas fa-asterisk"></i>
                </label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                           value="{{ Auth::user()->first_name }}" required
                           autocomplete="name" autofocus>

                    @error('name')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="website" class="col-md-4 col-form-label text-md-right">{{ __('edit_profile_shop.website') }}
                    <i class="fas fa-asterisk"></i>
                </label>

                <div class="col-md-6">
                    <input id="website" type="text" class="form-control @error('website') is-invalid @enderror"
                        name="website" value="{{ Auth::user()->shop['website'] }}" required
                        autocomplete="website" autofocus>

                    @error('website')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="name"
                    class="col-md-4 col-form-label text-md-right">{{ __('edit_profile_shop.established_date') }}</label>
                <div class="col-md-6">
                    <input type="date" class="form-control" name="dob"
                        value="{{ Auth::user()->date_of_birth }}">
                </div>
            </div>

            <div class="form-group row">
                <label for="introduction" class="col-md-4 col-form-label text-md-right">{{ __('edit_profile_shop.introduction') }}
                    <i class="fas fa-asterisk"></i>
                </label>

                <div class="col-md-6">
                    <textarea id="introduction" maxlength='2000' type="text" class="form-control @error('introduction') is-invalid @enderror"
                        name="introduction"
                        autofocus> {{ Auth::user()->introduction }} </textarea>
                        <p> {{ __('edit_profile_shop.max_words') }} </p>
                </div>
            </div>


            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('edit_profile_shop.update_btn') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
@section('dashboard.script')
<script>
    // Change dashboard current menu as active
    $('#edit-profile').addClass('active');
</script>
@endsection
