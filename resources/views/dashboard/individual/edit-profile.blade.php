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
    <div class="card-header">{{ __('edit_profile_ind.card_name') }}</div>

    <div class="card-body">
        <form method="post" action="{{ route('individual.profileUpdate', Auth::user()->id) }}">
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
                <label for="userId" class="col-md-4 col-form-label text-md-right">{{ __('edit_profile_ind.user_id') }}</label>

                <div class="col-md-6">
                    <div>
                        <span class="align-middle">{{ Auth::user()->id }}</span>
                    </div>
                    <div>
                        <a href="{{ route('individual.profile', Auth::user()->id) }}">snappinvn.com/member/{{ Auth::user()->id }}</a>
                    </div>
                    <div style="color:red">
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </div>
                </div>

            </div>

            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('edit_profile_ind.name') }}
                    <i class="fas fa-asterisk"></i>
                </label>

                <div class="col-md-3">
                    <input id="first_name" type="text" class="form-control @error('name') is-invalid @enderror" name="first_name" value="{{ Auth::user()->first_name}}" required placeholder="{{ __('edit_profile_ind.first_name') }}" autocomplete="name" autofocus>
                </div>
                <div class="col-md-3">
                    <input id="last_name" type="text" class="form-control @error('name') is-invalid @enderror" name="last_name" value="{{ Auth::user()->last_name }}" placeholder="{{ __('edit_profile_ind.last_name') }}" autocomplete="name" autofocus>
                </div>
            </div>

            <div class="form-group row">
                <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('edit_profile_ind.gender') }} </label>
                <div class="col-md-6">
                    <div class="input-group">
                        @include('components.gender')
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="height" class="col-md-4 col-form-label text-md-right">{{ __('edit_profile_ind.height') }}

                </label>
                <div class="col-md-6">
                    <div class="input-group">
                        <div class="input-group">
                            @include('components.height')
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="date" class="col-md-4 col-form-label text-md-right">{{ __('edit_profile_ind.date_birth') }}</label>
                <div class="col-md-6">
                    <input type="date" class="form-control" name="dob" value="{{ Auth::user()->date_of_birth }}">
                </div>
            </div>

            <div class="form-group row">
                <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('edit_profile_ind.phone') }}</label>
                <div class="col-md-6">
                    <input id="phone" type="tel" class="form-control" name="phone" value="{{ Auth::user()->phone }}" onkeypress="return isNumberKey(event)">
                </div>
            </div>


            <div class="form-group row">
                <label for="introduction" class="col-md-4 col-form-label text-md-right">{{ __('edit_profile_ind.introduction') }}
                    <i class="fas fa-asterisk"></i>
                </label>

                <div class="col-md-6">
                    <textarea id="introduction" type="text" maxlength='2000' class="form-control @error('introduction') is-invalid @enderror" name="introduction" autofocus>{{ Auth::user()->introduction }} </textarea>
                    <p>※2,000 letters max</p>
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
    $('#edit-profile').addClass('active');

    $(document).ready(function() {
        var height = '{{ Auth::user()->height }}';
        var gender = '{{ Auth::user()->gender }}';

        $("#height option[value='" + height + "']").attr("selected", "selected");
        $("#gender option[value='" + gender + "']").attr("selected", "selected");
    });

    function option(id, name, selectedId) {

        if (id == selectedId) {
            var option = "<option selected value='" + id + "'> " + name +
                "</option>";
        } else {
            var option = "<option value='" + id + "'> " + name +
                "</option>";
        }

        return option;
    }

    function isNumberKey(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    }
</script>
@endsection
