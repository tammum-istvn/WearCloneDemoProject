@extends('master')
@section('custom-css')
<link rel="stylesheet" href="{{ asset('css/lookPage.css') }}">

<head>
    <meta property="og:url" content="{{url()->current()}}" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Snappinvn" />
    <meta property="og:description" content="Description" />
    <meta property="og:image" content="{{ url()->current() }}" />
</head>
@endsection
@section('main')
<section class="main-menu">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                {{-- <ul class="product-path">--}}
                {{-- <li><a href="/fashion/public">Home</a></li>--}}
                {{-- <li><a href="{{ route('shop.profile',$look->user_id) }}">{{ $look->user->first_name }}</a></li>--}}
                {{-- <li><a href="{{url()->current()}}">{{$look->title}}</a></li>--}}
                {{-- </ul>--}}
                <div class="user-menu">
                    <div class="row">
                        <div class="col-md-10">
                            <div class="user-avatar">
                                <a href="{{ route('individual.profile', $look->user['id'])}}">
                                    <img src="{{ isset($look->user['picture'])? url($look->user['picture']): url('img/no-image.png') }}" alt="avatar">
                                </a>
                            </div>
                            <div class="user-content">
                                <p class="user-name">{{ optional($look->user)->first_name }} {{ optional($look->user)->last_name }}</p>
                                <ul class="user-info">
                                    <li>HEIGHT: {{ $look->height }} CM</li>
                                    <li>AGE: {{ $look->age }} YEARS</li>
                                    <li>GENDER: {{ strtoupper($look->gender) }}</li>
                                    @if($look->user->address)
                                    <li>CITY: {{ $look->user->address->city}}</li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                        {{-- <div class="col-md-2 follow-zone">--}}
                        {{-- <a id="favourite-btn" class="button btn-follow">--}}
                        {{-- <span id="favourite-btn-text">Follow</span>--}}
                        {{-- </a>--}}
                        {{-- </div>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="main-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="look-detail row">
                    <div class="look-post  col-md-7">
                        <div class="look-detail-images">
                            <img src="{{ url($look->picture) }}" alt="Look Picture" class="look-img">
                        </div>
                        <div class="look-detail-action">
                            <section class="look-action">
                                <a class="like-link action-link" id="like-btn">
                                    <img id="normal-heart" class="heart-icon active-heart" style="width: 30px" src="https://img.icons8.com/wired/64/000000/facebook-like.png" />
                                    <img id="red-heart" class="heart-icon" style="width: 30px;" src="https://img.icons8.com/dusk/64/000000/facebook-like.png" />
                                    {{-- <svg id="normal-heart" class="heart-icon active-heart" fill="#262626" height="24" viewBox="0 0 48 48" width="24"><path d="M34.6 6.1c5.7 0 10.4 5.2 10.4 11.5 0 6.8-5.9 11-11.5 16S25 41.3 24 41.9c-1.1-.7-4.7-4-9.5-8.3-5.7-5-11.5-9.2-11.5-16C3 11.3 7.7 6.1 13.4 6.1c4.2 0 6.5 2 8.1 4.3 1.9 2.6 2.2 3.9 2.5 3.9.3 0 .6-1.3 2.5-3.9 1.6-2.3 3.9-4.3 8.1-4.3m0-3c-4.5 0-7.9 1.8-10.6 5.6-2.7-3.7-6.1-5.5-10.6-5.5C6 3.1 0 9.6 0 17.6c0 7.3 5.4 12 10.6 16.5.6.5 1.3 1.1 1.9 1.7l2.3 2c4.4 3.9 6.6 5.9 7.6 6.5.5.3 1.1.5 1.6.5.6 0 1.1-.2 1.6-.5 1-.6 2.8-2.2 7.8-6.8l2-1.8c.7-.6 1.3-1.2 2-1.7C42.7 29.6 48 25 48 17.6c0-8-6-14.5-13.4-14.5z"></path></svg>--}}
                                    {{-- <svg id="red-heart" class="heart-icon" fill="#ed4956" height="24" viewBox="0 0 48 48" width="24"><path d="M34.6 3.1c-4.5 0-7.9 1.8-10.6 5.6-2.7-3.7-6.1-5.5-10.6-5.5C6 3.1 0 9.6 0 17.6c0 7.3 5.4 12 10.6 16.5.6.5 1.3 1.1 1.9 1.7l2.3 2c4.4 3.9 6.6 5.9 7.6 6.5.5.3 1.1.5 1.6.5s1.1-.2 1.6-.5c1-.6 2.8-2.2 7.8-6.8l2-1.8c.7-.6 1.3-1.2 2-1.7C42.7 29.6 48 25 48 17.6c0-8-6-14.5-13.4-14.5z"></path></svg>--}}
                                </a>
                                {{-- <a id="comment-btn" class="comment-link action-link" onclick="showComment()">--}}
                                {{-- <svg class="comment-icon" fill="#262626" height="24" viewBox="0 0 48 48" width="24"><path clip-rule="evenodd" d="M47.5 46.1l-2.8-11c1.8-3.3 2.8-7.1 2.8-11.1C47.5 11 37 .5 24 .5S.5 11 .5 24 11 47.5 24 47.5c4 0 7.8-1 11.1-2.8l11 2.8c.8.2 1.6-.6 1.4-1.4zm-3-22.1c0 4-1 7-2.6 10-.2.4-.3.9-.2 1.4l2.1 8.4-8.3-2.1c-.5-.1-1-.1-1.4.2-1.8 1-5.2 2.6-10 2.6-11.4 0-20.6-9.2-20.6-20.5S12.7 3.5 24 3.5 44.5 12.7 44.5 24z" fill-rule="evenodd"></path></svg>--}}
                                {{-- </a>--}}
                                <a id="share-btn" class="share-link action-link" style="float: right; width: 30px;">
                                    <img src="https://img.icons8.com/color/48/000000/facebook-circled.png" />
                                </a>
                            </section>
                            <section class="counts">
                                <div class="like-and-comment"><span id="like-count"></span> likes, <span id="comment-count">{{$look->comments->count()}}</span> comments </div>
                                {{-- <div class="count-comment"><span id="comment-count"></span> comments</div>--}}
                            </section>
                            <section class="look-info">
                                <p class="look-title"><strong>{{ $look->title }}</strong> {{ $look->description }}</p>
                                <a class="see-more-link" onclick="seeMore()">...more</a>
                            </section>
                            <section class="look-hashtag">
                                <p>
                                    @foreach($look->hashtags as $lookHashtag)
                                    <span>#{{$lookHashtag->hashTag->name}}</span>
                                    @endforeach
                                </p>
                            </section>
                            <section class="comment-zone">
                                <div id="comments" class="showing">
                                    {{-- @foreach($look->comments as $comment)--}}
                                    {{-- <!-- start comment component -->--}}
                                    {{-- @component('components.comment')--}}
                                    {{-- @slot('image')--}}
                                    {{-- {{ $comment->user->picture ?? 'img/profile-cartoon.jpg' }}--}}
                                    {{-- @endslot--}}

                                    {{-- @slot('name')--}}
                                    {{-- {{ $comment->user->first_name }}--}}
                                    {{-- @endslot--}}

                                    {{-- @slot('comment')--}}
                                    {{-- {{ $comment->comment }}--}}
                                    {{-- @endslot--}}

                                    {{-- @slot('user_id')--}}
                                    {{-- {{ $comment->user_id }}--}}
                                    {{-- @endslot--}}

                                    {{-- @slot('id')--}}
                                    {{-- {{ $comment->id }}--}}
                                    {{-- @endslot--}}

                                    {{-- @slot('date')--}}
                                    {{-- {{ $comment->created_at }}--}}
                                    {{-- @endslot--}}
                                    {{-- @endcomponent--}}
                                    {{-- <!-- end component -->--}}
                                    {{-- @endforeach--}}

                                    @foreach($look->comments as $comment)
                                    <div class="each-comment">
                                        <div class="comment">
                                            <div class="comment-avatar">
                                                <img src="{{ url($comment->user->picture ?? 'img/profile-cartoon.jpg') }}">
                                            </div>
                                            <div class="comment-not-avatar" style="display: flex">
                                                <div class="comment-input">
                                                    <p><strong>{{ optional($comment->user)->first_name }}</strong>
                                                        {{$comment->comment}}
                                                    </p>
                                                </div>
                                                @auth
                                                <a class="comment-delete" onclick="deleteComment(`{{$comment->id}}`, this)">
                                                    <img src="https://img.icons8.com/carbon-copy/100/000000/trash.png" />
                                                </a>
                                                @endauth
                                            </div>
                                        </div>
                                        <div class="bottom-comment">
                                            <span>{{$comment->created_at}}</span>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="comment add-new-comment">
                                    <div class="comment-avatar">
                                        <img src="{{ optional(Auth::user())->picture ? url(Auth::user()->picture) : url('img/profile-cartoon.jpg') }}">
                                    </div>
                                    <div class="comment-not-avatar" style="display: flex">
                                        <textarea placeholder="Add a comment..." id="comment" class="form-control comment-input is-new-comment"></textarea>
                                        <button class="form-control comment-btn" onclick="comment()" type="button">Send</button>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                    <div class="look-detail-content col-md-5">
                        <div id="accordion" class="panel-group">
                            <div class="card">
                                <div class="card-header">
                                    <a class="card-link" data-toggle="collapse" href="#collapseOne" aria-expanded="true">
                                        <h4>Items ({{ sizeof($look->items) }})</h4>
                                    </a>
                                </div>
                                <div id="collapseOne" class="collapse show" data-parent="#accordion">
                                    <div class="card-body">
                                        @foreach($look->items as $item)
                                        <div class="item-element">
                                            <div class="row">
                                                <div class="col-4 image-price">
                                                    <img src="{{ url($item->itemDetailInformation->itemDetail->picture[0]) }}" alt="{{$item->itemDetailInformation->itemDetail->item->title}}">
                                                    <div class="item-price">{{$item->itemDetailInformation->price()}}</div>
                                                </div>
                                                <div class="col-8">
                                                    <h4>{{ $item->itemDetailInformation->itemDetail->item->title }}</h4>
                                                    <p class="category"> {{($item->itemDetailInformation->itemDetail->item->category->name)}} / {{($item->itemDetailInformation->itemDetail->item->subCategory->name)}}</p>
                                                    <p class="color"> Color: {{$item->itemDetailInformation->itemDetail->color}}</p>
                                                    <p class="size"> Size: {{$item->itemDetailInformation->size}}</p>
                                                    @if($item->itemDetailInformation->is_delete || $item->itemDetailInformation->itemDetail->item->is_delete)
                                                    <a class="button see-detail-btn" href="#" disabled>
                                                        {{ __('Out of stock') }}
                                                    </a>
                                                    @else
                                                    <a class="button see-detail-btn" href="{{ route('itemDetail', $item->itemDetailInformation->itemDetail->item_id) }}">
                                                        {{ __('look.see_detail') }}
                                                    </a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="look-post  col-md-7">
                        @if(sizeof($popular) > 0)
                        <div class="popular-looks">
                            <h3>{{$look->user->first_name}}'s popular looks</h3>
                            <div class="popular-look-element">
                                <div class="row">
                                    @foreach($popular as $popularLook)
                                    <div class="col-4 each-popular">
                                        <div class="card">
                                            <div class="card-top">
                                                <a href="{{ route('detail',$popularLook->id) }}">
                                                    <div class="popular-img" style="background-image: url('{{ url($popularLook->picture) }}');
                                                            background-size: cover; background-repeat: no-repeat;">
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="card-bottom">
                                                <img src="https://img.icons8.com/windows/48/000000/hearts.png" /> {{ $popularLook->getFavouriteCountAttribute()}}
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('script')
<script>
    $(document).ready(function() {
        let numberOfHashtag = "{{count($look->hashtags)}}";
        let title = $(".look-title").text();
        if (numberOfHashtag > 0 || title.length > 70) {
            $(".see-more-link").css("display", "block");
        } else {
            $(".see-more-link").css("display", "none");
        }
    });

    function seeMore() {
        $(".look-hashtag").addClass("showing");
        $(".see-more-link").css("display", "none");
        $(".look-info .look-title").css("overflow", "visible");
        $(".look-info .look-title").css("whiteSpace", "normal");
    }
    $(document).ready(function() {
        loadLikes();
        $("#like-btn").click(function() {
            if ("{{Auth::User()}}") {
                let isInsertLike = false;
                toogleLikeButton();
                if ($("#like-btn").hasClass("red-like")) {
                    //insert like in DB
                    isInsertLike = true;
                    $("#like-count").text(parseInt($("#like-count").text()) + 1);
                } else {
                    $("#like-count").text(parseInt($("#like-count").text()) - 1);
                }
                handleLikes(isInsertLike);
            } else {
                window.location.href = "{{route('login')}}";
            }
        });
    });
    //handleLikes
    function handleLikes(isInsertLike) {
        let isInsertLikes;
        let lookId;
        let url = "{{route('addRemoveLike')}}";
        let data = {
            isInsertLikes: isInsertLike,
            lookId: "{{$look->id}}"
        }
        AjaxRequest.post(url, data).done((data) => {});
    }

    function loadLikes() {
        let url = "{{route('loadLike')}}";
        let data = {
            lookId: "{{$look->id}}"
        }
        AjaxRequest.post(url, data).done((data) => {
            if (data.likeStatus) {
                changeLikeButtonToHighlight();
            } else {
                changeLikeButtonToNormal();
            }
            $("#like-count").text(data.likesCount);
        });
    }

    function toogleLikeButton() {
        if ($("#like-btn").hasClass("red-like")) {
            changeLikeButtonToNormal();
        } else {
            changeLikeButtonToHighlight();
        }
    }
    //change like button to normal
    function changeLikeButtonToNormal() {
        $("#red-heart").removeClass("active-heart");
        $("#like-btn").removeClass("red-like");
        $("#normal-heart").addClass("active-heart");
    }

    //change like button to highlight
    function changeLikeButtonToHighlight() {
        $("#normal-heart").removeClass("active-heart")
        $("#red-heart").addClass("active-heart");
        $("#like-btn").addClass("red-like");
    }

    function showComment() {
        $("#comments").addClass("showing");
    }
    // create a new comment
    function comment() {
        // force login for comment
        if (!`{{ Auth::check() }}`) {
            window.location.href = "{{route('login')}}";
            return;
        }
        var comment = $('#comment').val();
        let url = "{{route('comments.store')}}";
        let data = {
            look_id: "{{$look->id}}",
            user_id: "{{Auth::user()->id ?? ''}}",
            comment: comment
        }

        // Todo:: The laravel component is not working properly when using form JS
        // Need to work with this later
        AjaxRequest.post(url, data).done((data) => {
            console.log(data);
            var html = `<div class="each-comment">
                            <div class="comment">
                                <div class="comment-avatar">
                                    <img src="{{ url(Auth::user()->picture ?? 'img/profile-cartoon.jpg') }}">
                                </div>
                                <div class="comment-not-avatar" style="display: flex">
                                    <div class="comment-input">
                                        <p><strong>{{ optional(Auth::user())->first_name }}</strong>
                                            ` + data.comment + `
                                        </p>
                                    </div>
                                    @auth
                                    <a class="comment-delete" onclick="deleteComment(` + data.id + `, this)">
                                        <img src="https://img.icons8.com/carbon-copy/100/000000/trash.png"/>
                                    </a>
                                    @endauth
                                </div>
                            </div>
                            <div class="bottom-comment">
                                <span>` + data.created_at + `</span>
                            </div>
                        </div>`;
            $('#comments').append(html);

            // make empty the comment field
            $('#comment').val('');
        });
    }

    function deleteComment(id, element) {

        let url = "{{ route('comments.destroy','') }}" + '/' + id;
        AjaxRequest.delete(url).then(function(data) {
            if (data) {
                // delete the comment from view
                $(element).parents('.comment').remove();
            } else {
                console.log(data);
            }
        }).catch(function(err) {
            console.log(err);
        });
    }
</script>
@endsection('script')