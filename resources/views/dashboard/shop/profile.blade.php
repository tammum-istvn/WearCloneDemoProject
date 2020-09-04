@extends('master')
@section('custom-css')
<link rel="stylesheet" href="{{ asset('css/profile.css') }}">
@endsection
@section('main')
    <section class="profile-container">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="profile-header row">
                        <div class="profile-header-left col-md-3">
                            <div class="profile-avatar">
                                <img src="@if($profile['picture']) {{ url($profile['picture']) }} @else {{ url('/img/profile-cartoon.jpg') }} @endif" alt="Avatar">
                            </div>
                            <?php $owner = false ?>
                            @if(Auth::check())
                                @if(isset($profile))
                                    <?php $currentUser = Auth::user()->id ?>
                                    @if( $currentUser== $profile['id'])
                                        <?php $owner = true ?>
                                        <div class="profile-follow">
                                            <a class="button is-light" href="{{ route(Session::get('api_prefix').'.profileEdit') }}">
                                                <span>Edit profile</span>
                                            </a>
                                        </div>
                                    @else
                                        <div class="profile-follow">
                                            <a class="button is-light" id="favourite-btn" >
                                                <span><i class="fa fa-star" style="color: white" aria-hidden="true"></i></span>
                                                <span id="favourite-btn-text">{{ __('Follow') }}</span>
                                            </a>
                                        </div>
                                    @endif
                                @endif
                            @endif
                        </div>
                        <div class="profile-header-right col-md-9">
                            <div class="profile-info row">
                                <div class="basic-info col-12">
                                    <h1>{{ $profile['first_name'] }}</h1>
                                    <div class="profile-other-info">
                                        <ul>
                                            @if(isset($profile->height))<li>HEIGHT: {{ $profile->height . " CM" }}</li>@endif
                                            @if(isset($profile->gender))<li>GENDER: {{ strtoupper($profile->gender) }}</li>@endif
                                            @if(isset($profile->address))<li>ADDRESS: {{ strtoupper(optional($profile->address)->city) }}</li>@endif
                                        </ul>
                                    </div>
                                </div>
                                @if(isset($profile->introduction))
                                    <div class="profile-intro col-12 row">
                                        <h2 class="label col-2">Introduction:</h2>
                                        <p class="col-10">{{ $profile->introduction }}</p>
                                    </div>
                                @endif
                                @if(sizeof($top6Brands) > 0)
                                    <div class="favourite-brand col-12">
                                        <h2 class="label">Favorite<br>brands</h2>
                                        <ul>
                                            @foreach($top6Brands as $brand)
                                                <li><a>{{$brand->name}}</a></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="profile-container-content" style="display: flex; min-height: 440px;">
        <div class="container">
            @yield('contentProfile')
        </div>
    </section>
@endsection
@section('script')
<script>
    function showList(var1, var2, var3) {
        $("#"+var1).removeClass("showing-tab"); $("#li-"+var1).removeClass("li-selected");
        $("#"+var2).removeClass("showing-tab"); $("#li-"+var2).removeClass("li-selected");
        $("#"+var3).addClass("showing-tab"); $("#li-"+var3).addClass("li-selected");
    }

    $(document).ready(function () {
        loadIsFavourite();
        $("#favourite-btn").click(function () {
            if ("{{ Auth::User() }}") {
                let isInsertFavourite = false;
                $("#favourite-btn").toggleClass("is-danger");
                if ($("#favourite-btn").hasClass("is-danger")) {
                    $("#favourite-btn-text").text("Following");
                    isInsertFavourite = true;
                    handleFavourite(isInsertFavourite);
                } else {
                    $("#favourite-btn-text").text("Follow");
                    handleFavourite(isInsertFavourite);
                }

            } else {
                //redirect to login page
                window.location.href = "{{route('login')}}";
            }
        });
    });

    //checking if user already add shop to favourite
    function loadIsFavourite() {
        if ("{{ Auth::User() }}") {
        let url = "{{route('isfavourite')}}" ;
        let data = {
            userId: "{{$profile->id}}"
        }
        AjaxRequest.post(url,data).done((data) => {
            console.log("favouriteStatus when reload :: " + data.favouriteStatus);
            if (data.favouriteStatus) {
                $("#favourite-btn").addClass("is-danger");
                $("#favourite-btn-text").text("Following");
            }
        });

        }
    }
    //handleLikes
    function handleFavourite(isInsertFavourite) {
        let isInsert;
        let userId;
        let url = "{{route('addRemoveFavourite')}}";
        console.log(url);
        let data = {
            isInsert:isInsertFavourite,
            userId: "{{$profile->id}}"
        }
        AjaxRequest.post(url,data).done((data) => {
        console.log("data after ajax" + JSON.stringify(data));
        });
    }
</script>
@endsection
