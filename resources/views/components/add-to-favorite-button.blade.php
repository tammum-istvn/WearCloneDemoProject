@props([
    'profileId' => '',
    'linkId' => ''
    ])
<div>
    <a class="button is-light" id="favourite-btn-{{$linkId}}">
        <span><i class="fa fa-star" style="color: white" aria-hidden="true"></i>
        </span>
        <span id="favourite-btn-text{{$linkId}}">{{__('shop_profile.add_to_favourite')}}
        </span></a>
</div>
@section('language.script')
    <script>
        $(document).ready(function () {
            loadIsFavourite();
            $("#favourite-btn-"+ "{{$linkId}}").click(function () {
                if ("{{ Auth::User() }}") {
                    let isInsertFavourite = false;
                    $("#favourite-btn-"+ "{{$linkId}}").toggleClass("is-danger");
                    if ($("#favourite-btn-"+ "{{$linkId}}").hasClass("is-danger")) {
                        $("#favourite-btn-text" + "{{$linkId}}").text({{__('shop_profile.added_to_favourite')}});
                        isInsertFavourite = true;
                        handleFavourite(isInsertFavourite);
                    } else {
                        $("#favourite-btn-text" + "{{$linkId}}").text({{__('shop_profile.add_to_favourite')}});
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
        let url = "{{route('shop.isfavourite')}}" ;
        let data = {
            userId: "{{$profileId}}"
        }
        AjaxRequest.post(url,data).done((data) => {
            console.log("favouriteStatus when reload :: " + data.favouriteStatus);
            if (data.favouriteStatus) {
                $("#favourite-btn-"+ "{{$linkId}}").addClass("is-danger");
                $("#favourite-btn-text" + "{{$linkId}}").text({{__('shop_profile.added_to_favourite')}});
            }
        });

        }
    }

    //handleLikes
    function handleFavourite(isInsertFavourite) {
        let isInsert;
        let userId;
        let url = "{{route('shop.addRemoveFavourite')}}";
        console.log(url);
        let data = {
            isInsert:isInsertFavourite,
            userId: "{{$profileId}}"
        }
        // console.log(data);
        AjaxRequest.post(url,data).done((data) => {
        console.log("data after ajax" + JSON.stringify(data));
        // $("#like-count").text(data.likesCount);
        });

    }
    </script>
@endsection
