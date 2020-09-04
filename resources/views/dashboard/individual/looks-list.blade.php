@extends('dashboard.individual.profile')
@section('contentProfile')
    <div class="profile-menu">
        <nav class="clearfix">
            <div class="profile-menu-left">
                <ul>
                    <li class="current">
                        <a href="{{route('individual.profile', $profile->id)}}">
                            {{ count($looks) }}<span>LOOKS</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="profile-menu-right">
                <ul>
                    <li>
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
            <?php $owner = false ?>
            @if(Auth::check())
                @if(isset($profile))
                    <?php $currentUser = Auth::user()->id ?>
                    @if( $currentUser== $profile['id'])
                        <?php $owner = true ?>
                        <div class="item-card-wrapper col-md-3">
                            <div class="card" style="height: 100%">
                                <div class="item-container-top">
                                    <a href="{{ route('individual.look') }}" style="height: 100%;display: flex;flex-direction: column;justify-content: center;">
                                        <div class="text-center">
                                            <img src="https://img.icons8.com/android/48/000000/plus.png"/>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endif
                @endif
            @endif
            @foreach($looks as $look)
                <div class="item-card-wrapper col-md-3">
                    <div class="card">
                        <div class="item-container-top">
                            @if($owner)
                                <img class="item-img" src="{{ url($look->picture) }}" alt="Look" style="height: 100%; width: 100%; object-fit: cover;">
                                <div class="overlay"></div>
                                <div class="button-on-pic">
                                    <a href="{{ route('individual.lookShow',$look->id) }}" class="edit-btn"><i class="fa fa-pencil-square-o"></i> Edit</a>
                                    <a href="{{ route('detail',$look['id']) }}" class="view-btn"><i class="fa fa-link"></i> View</a>
                                </div>
                                <p class="post-date">
                                    <i class="far fa-clock"></i>
                                    {{$look->created_at->format('Y-m-d')}}
                                </p>
                            @else
                                <a href="{{ route('detail',$look['id']) }}">
                                    <img class="item-img" src="{{ url($look->picture) }}" alt="Look">
                                    <p class="post-date">
                                        <i class="far fa-clock"></i>
                                        {{$look->created_at->format('Y-m-d')}}
                                    </p>
                                </a>
                            @endif
                        </div>
                        <div class="item-container-bottom">
                            <div class="favorite-section px-2 text-right user-select-none">
                                <i class="far fa-heart" style="font-size: 16px"></i>
                                <span class="favorite">{{ $look->getFavouriteCountAttribute() }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
