@extends('dashboard.individual.profile')
@section('contentProfile')
    <div class="profile-menu">
        <nav class="clearfix">
            <div class="profile-menu-left">
                <ul>
                    <li>
                        <a href="{{route('individual.profile', $profile->id)}}">
                            {{ count($looks) }}<span>LOOKS</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="profile-menu-right">
                <ul>
                    <li class="current">
                        <a href="{{route('individual.liked', $profile->id)}}">
                            {{sizeof($likedLooks)}}<span>LIKED LOOKS</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('individual.follower', $profile->id)}}">
                            {{sizeof($followerList)}}<span>FOLLOWERS</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('individual.following', $profile->id)}}">
                            {{sizeof($followingList)}}<span>FOLLOWING</span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>

    <div class="items-list profile-content">
        <div class="row">
            @foreach($likedLooks as $likedLook)
                <div class="item-card-wrapper col-md-3">
                    <div class="card">
                        <div class="item-container-top">
                            <a href="{{ route('detail',$likedLook['id']) }}">
                                <img class="item-img" src="{{ url($likedLook->picture) }}" alt="Look">
                                <p class="post-date">
                                    <i class="far fa-clock"></i>
                                    {{$likedLook->created_at->format('Y-m-d')}}
                                </p>
                            </a>
                        </div>
                        <div class="item-container-bottom">
                            <div class="favorite-section px-2 text-right user-select-none">
                                <i class="far fa-heart" style="font-size: 16px"></i>
                                <span class="favorite">{{ $likedLook->getFavouriteCountAttribute() }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
