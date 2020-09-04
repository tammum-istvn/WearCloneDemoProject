@extends('layouts.dashboard')
@section('dashboard.style')
    <style>
        .fa-asterisk {
            font-size: 7pt;
            color: #ff000085;
        }

        .image img {
            height: 300px;
            max-width: 220px;
            border: 1px solid;
            border-style: dotted;
        }

        .file .file-label {
            width: 220px;
            margin-top: 1px;
        }
    </style>
@endsection

@section('menu-content')

    <div class="card">
        <div class="card-header">{{ __('change_pic.card_name') }}</div>
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group row">
                    @if(session('message'))
                        <div class="alert alert-success mx-auto" role="alert">
                            <span class="alert ">{{ session('message') }} </span>
                        </div>
                    @endif
                </div>

                <div class="form-group row">
                    <label class="col-md-4 col-form-label text-md-right">
                        {{-- {{ __('Picture') }} --}}
                        {{-- <i class="fas fa-asterisk"></i> --}}
                    </label>

                    <div class="col-md-6">
                        <div class="image">
                            <img id="imagePreview" src="@if(Auth::user()->picture) {{ url(Auth::user()->picture) }} @else {{ url('/img/profile-cartoon.jpg') }} @endif" />
                        </div>

                        <div class="file">
                            <label class="file-label">
                                <input id="image" onchange="PreviewImage()" class="file-input" type="file" name="image">
                                <span class="file-cta">
                                <span class="file-icon">
                                    <i class="fas fa-upload"></i>
                                </span>
                                <span class="file-label">
                                    {{ __('change_pic.choose_pic') }}
                                </span>
                            </span>
                            </label>
                        </div>

                        <div style="color:red">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" formaction="{{ route('profilePictureUpdate') }}" class="button is-info">
                            {{ __('change_pic.update_btn') }}
                        </button>
                        <a href="{{ URL::previous() }}" style="text-decoration: none" class="button ml-5">
                            {{ __('change_pic.cancel_btn') }}
                        </a>
                    </div>

                </div>
            </form>
        </div>
    </div>

@endsection

@section('dashboard.script')

    <script>
        // Change dashboard current menu as active
        $('#edit-picture').addClass('active');

        function PreviewImage() {
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("image").files[0]);

            oFReader.onload = function(oFREvent) {
                document.getElementById("imagePreview").src = oFREvent.target.result;
            };
        };
    </script>
@endsection
