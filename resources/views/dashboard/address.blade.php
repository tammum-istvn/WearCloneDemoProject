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
        <div class="card-header">{{ __('Address') }}</div>

        <div class="card-body">
            <form method="post" action="{{ route('addressUpdate') }}">
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
                    <div class="col-md-6 offset-md-4">
                        <div style="color:red">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </div>
                    </div>

                </div>

                <div class="form-group row">
                    <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('edit_profile_ind.address') }} <i class="fas fa-asterisk"></i></label>

                    <div class="col-md-6">
                        <textarea id="address" maxlength='200' type="text" class="form-control @error('address') is-invalid @enderror" name="address" autofocus>{{ isset(Auth::user()->address) ? Auth::user()->address['address'] : '' }} </textarea>
{{--                        <p> {{ __('edit_profile_ind.max_words') }} </p>--}}
                    </div>
                </div>

                <div class="form-group row">
                    <label for="province" class="col-md-4 col-form-label text-md-right">{{ __('edit_profile_ind.province') }} <i class="fas fa-asterisk"></i>
                    </label>
                    <div class="col-md-6">
                        <input id="province" type="text" class="form-control" name="province" value="{{ isset(Auth::user()->address) ? Auth::user()->address['province'] : ''}}">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('edit_profile_shop.city') }} <i class="fas fa-asterisk"></i>
                    </label>
                    <div class="col-md-6">
                        <input id="city" type="text" class="form-control" name="city" value="{{ isset(Auth::user()->address) ? Auth::user()->address['city'] : ''}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="post_code" class="col-md-4 col-form-label text-md-right">{{ __('Zip code') }} <i class="fas fa-asterisk"></i>
                    </label>
                    <div class="col-md-6">
                        <input id="post_code" type="text" class="form-control" name="post_code" value="{{ isset(Auth::user()->address) ? Auth::user()->address['post_code'] : ''}}" min="0">
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('edit_profile_ind.update_btn') }}
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
    $('#edit-address').addClass('active');

    function setInputFilter(textbox, inputFilter) {
        ["input", "keydown", "keyup", "mousedown", "mouseup", "select", "contextmenu", "drop"].forEach(function(event) {
            textbox.addEventListener(event, function() {
                if (inputFilter(this.value)) {
                    this.oldValue = this.value;
                    this.oldSelectionStart = this.selectionStart;
                    this.oldSelectionEnd = this.selectionEnd;
                } else if (this.hasOwnProperty("oldValue")) {
                    this.value = this.oldValue;
                    this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
                } else {
                    this.value = "";
                }
            });
        });
    }
    $(document).ready(function (){
        setInputFilter(document.getElementById("post_code"), function(value) {
            return /^\d*$/.test(value); });
    });
    </script>
@endsection
