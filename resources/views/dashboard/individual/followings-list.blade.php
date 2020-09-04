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
                    <li class="current">
                        <a href="{{route('individual.following', $profile->id)}}">
                            {{sizeof($followingList)}}<span>FOLLOWING</span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>

    <div class="users-list profile-content">
        <div class="row">
            @foreach($followingList as $eachFollowing)
                <div class="user-card-wrapper col-lg-4 col-md-6">
                    <div class="user-container card">
                        <div class="user-container-left">
                            <a href="@if($eachFollowing[0]->account_type == "shop") {{route('shop.profile', $eachFollowing[0]->id)}} @else {{route('individual.profile', $eachFollowing[0]->id)}} @endif">
                                <div class="follow-avatar" style="background-image: url('{{ url($eachFollowing[0]['picture'])}} ?? {{ url('/img/profile-cartoon.jpg')}}');
                                    padding-bottom: 100%;
                                    background-size: cover;
                                    border-radius: 50%;">
                                </div>
                            </a>
                        </div>
                        <div class="user-container-right">
                            <h3 class="user-name">
                                <a href="@if($eachFollowing[0]->account_type == "shop") {{route('shop.profile', $eachFollowing[0]->id)}} @else {{route('individual.profile', $eachFollowing[0]->id)}} @endif">
                                    <span>{{ $eachFollowing[0]->first_name }}</span>
                                </a>
                            </h3>
                            <ul class="user-info clearfix">
                                <li>{{strtoupper($eachFollowing[0]->account_type)}}</li>
                                @if(isset($eachFollowing[0]->height))<li>{{ $eachFollowing[0]->height ." CM"}}</li>@endif
                                @if(isset($eachFollowing[0]->gender))<li>{{ strtoupper($eachFollowing[0]->gender) }}</li>@endif
                            </ul>
                            <ul class="meta clearfix">
                                <li>
                                    <a href="@if($eachFollowing[0]->account_type == "shop") {{route('shop.profile', $eachFollowing[0]->id)}} @else {{route('individual.profile', $eachFollowing[0]->id)}} @endif">
                                        <span>{{count($eachFollowing[0]->look)}}</span>Looks
                                    </a>
                                </li>
                                <li>
                                    <a href="@if($eachFollowing[0]->account_type == "shop") {{route('shop.profile', $eachFollowing[0]->id)}} @else {{route('individual.follower', $eachFollowing[0]->id)}} @endif">
                                        <span>{{$eachFollowing[0]->getNumberOfFollower()}}</span>Followers
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
